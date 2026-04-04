<?php

namespace App\Http\Controllers;

use App\Models\Download;
use App\Models\Payments;
use App\Models\ResumeTemplate;
use App\Models\SkillSuggestion;
use App\Services\OpenAIService;
use App\Services\ResumeAIService;
use App\Services\ResumeScoreService;
use App\Services\SummaryService;
// use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Mail;
use Str;

class ResumeController extends Controller
{
    public function download($id, $s)
    {
        // 1. Verify ownership and existence
        $resume = Download::where('id', $id)
            ->where('user_id', auth()->id())
            ->firstOrFail();

        // 2. Use the file_path from your DB
        $url = $resume->file_path;

        // 3. Get the file content
        try {
            $fileContent = file_get_contents($url);

            if ($fileContent === false) {
                return back()->with('error', 'Could not retrieve the file from storage.');
            }

            // 4. Return the file as a download
            return response()->streamDownload(function () use ($fileContent) {
                echo $fileContent;
            }, $resume->file_name . '.pdf', [
                'Content-Type' => 'application/pdf',
            ]);

        } catch (\Exception $e) {
            return back()->with('error', 'Download failed: ' . $e->getMessage());
        }
    }
    public function tools()
    {
        return view('resumebuilder.tools');
    }

    public function resume_builder()
    {

       
        $resume_templates = ResumeTemplate::all();
        return view('resumebuilder.index', ['templates' => $resume_templates, 'template_id' => 1, 'template_slug' => 'ats-detailed']);
    }

    public function builder()
    {
        $encryptedId = request('t');
        if (!$encryptedId) {
            return response()->view('errors.invalid', [], 400);
        }
        try {
            $template_id = Crypt::decrypt($encryptedId);
        } catch (DecryptException $e) {
            \Log::warning('Template decryption failed', [
                'encrypted_id' => $encryptedId,
                'ip' => request()->ip(),
            ]);
            return response()->view('errors.invalid', [], 400);
        }
        $template = ResumeTemplate::find($template_id);
        if (!$template) {
            return response()->view('errors.invalid', [], 404);
        }
        $isPaidBefore = Payments::where('user_id', auth()->id())
            ->whereIn('status', ['captured', 'success', 'paid'])
            ->whereIn('plan_type', ['starter'])
            ->exists();
        $isPaid = $isPaidBefore ? 'YES' : 'NO';
        return view('resumebuilder.builder', compact('template', 'isPaid'));
    }

    public function generate(Request $request, OpenAIService $ai)
    {
        $user = Auth::user() ?? '';
        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized',
            ], 419);
        }

        if ($user->used_credits >= $user->total_credits) {
            return response()->json([
                'success' => false,
                'message' => 'No credits remaining.'
            ], 403);
        }

        $data = $request->all();
        if (!isset($data['professional_summary']) || !$data['professional_summary']) {
            return response()->json(
                [
                    'success' => false,
                    'message' => 'Please fill the required fields'
                ]
            );
        }
        try {
            // AI returns structured resume JSON
            $resume = $ai->generate($data);
            $user->increment('used_credits');
            $user->save();
            return response()->json([
                'success' => true,
                'message' => 'Resume generated successfully.',
                'html' => $resume,
                'used_credits' => $user->used_credits
            ]);

        } catch (\Throwable $e) {
            \Log::error('Resume AI Error: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to generate resume.'
            ], 500);
        }
    }
    public function pro_summary(Request $request, SummaryService $summary)
    {

        $user = Auth::user();
        if (!$user || $user->used_credits >= $user->total_credits) {
            return response()->json([
                'success' => false,
                'message' => 'No credits remaining.'
            ], 403);
        }

        try {
            // 🔹 Validate input properly
            $input_summary = trim($request['current_summary']);
            if (strlen($input_summary) < 10) {
                return response()->json([
                    'success' => false,
                    'message' => 'Summary must be at least 10 characters long.'
                ], 422);
            }


            // 🔹 Extra safety check
            if ($input_summary === 'null') {
                return response()->json([
                    'success' => false,
                    'message' => 'Invalid summary input.'
                ], 422);
            }

            if (!$user) {
                return response()->json([
                    'success' => false,
                    'message' => 'Unauthorized.'
                ], 401);
            }

            // 🔹 Expand via AI
            $expanded = $summary->expandSummary($input_summary);

            if (!$expanded || empty($expanded['summary'])) {
                return response()->json([
                    'success' => false,
                    'message' => 'AI failed to generate summary.'
                ], 500);
            }

            $finalSummary = $expanded['summary'];
            $user->increment('used_credits');
            $user->save();

            return response()->json([
                'success' => true,
                'message' => 'Summary expanded successfully.',
                'expanded_summary' => $finalSummary,
                'remaining_credits' => $user->total_credits - $user->used_credits,
                'used_credits' => $user->used_credits
            ]);

        } catch (\Illuminate\Validation\ValidationException $e) {

            return response()->json([
                'success' => false,
                'message' => $e->errors()['current_summary'][0] ?? 'Validation failed.'
            ], 422);

        } catch (\Throwable $e) {

            \Log::error('Summary AI Error', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Summary service is temporarily unavailable. Please try again later.'
            ], 500);
        }
    }
    public function resume_preview(Request $request)
    {
        $data = json_decode($request->resume_data, true);
        return view('templates.template1', compact('data'));
    }

    public function shiftPdf_export(Request $request)
    {
        $user = auth()->user();
        if (!$user)
            return redirect('login');

        // 1. Validation
        $html = $request->input('resume_html');
        $resume_title = $request->input('resume_title', 'RESUME');

        if (!$html) {
            return back()->with('error', 'NEURAL_LINK_FAILURE: No content detected.');
        }

        // 2. Credit Check
        if ($user->pdf_exports_used >= $user->pdf_export_balance) {
            $msg = 'LIMIT_REACHED: Please upgrade your storage plan.';
            return $request->ajax()
                ? response()->json(['success' => false, 'message' => $msg], 403)
                : back()->with('error', $msg);
        }

        // 3. API Request (PDFShift)
        try {
            $apiKey = config('services.pdfshift.key');

            // Prepare a clean filename for the PDF metadata
            $cleanName = Str::slug($resume_title) . '.pdf';

            $curl = curl_init();
            curl_setopt_array($curl, [
                CURLOPT_URL => "https://api.pdfshift.io/v3/convert/pdf",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_POST => true,
                CURLOPT_POSTFIELDS => json_encode([
                    "source" => $html,
                    "landscape" => false,
                    "format" => "A4",

                ]),
                CURLOPT_HTTPHEADER => [
                    "X-API-Key: " . $apiKey,
                    "Content-Type: application/json"
                ],
                CURLOPT_TIMEOUT => 30, // Don't hang forever
            ]);

            $response = curl_exec($curl);
            $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
            $curlError = curl_error($curl);
            curl_close($curl);

            if ($curlError || $httpCode !== 200) {
                \Log::error("PDFShift Error: " . ($curlError ?: $response));
                return back()->with('error', 'CORE_SYSTEM_ERROR: PDF generation failed.');
            }

            // 4. Storage & Logging (Post-Success)
            // Using Str::slug for clean R2 paths
            $fileName = 'resumes/user_' . $user->id . '/' . Str::slug($resume_title) . '_' . time() . '.pdf';

            // Save to Cloudflare R2
            Storage::disk('s3')->put($fileName, $response);
            $url = Storage::disk('s3')->url($fileName);

            // Record in Database
            $download = new Download();
            $download->user_id = $user->id;
            $download->file_path = $url;
            $download->file_name = Str::slug($resume_title);
            // Calculating size from the response string length
            $download->file_size = round(strlen($response) / 1024, 2) . ' KB';
            $download->save();

            // 5. Deduct Credit ONLY after successful generation/storage
            $user->increment('pdf_exports_used');
            $user->last_pdf_export_at = now();

            // 6. Return Clean Binary Response
            return response($response)
                ->header('Content-Type', 'application/pdf')
                // 'inline' tells the browser to show it in the tab
                // 'filename' tells the browser what to call that tab
                ->header('Content-Disposition', 'inline; filename="' . $cleanName . '"')
                ->header('Content-Transfer-Encoding', 'binary')
                ->header('Accept-Ranges', 'bytes')
                // This tells the browser NOT to look at the source URL for the name
                ->header('Title', $resume_title);

        } catch (\Exception $e) {
            \Log::critical("Export Exception: " . $e->getMessage());
            return back()->with('error', 'SYSTEM_CRASH: Unexpected error during export.');
        }
    }


    public function export(Request $request)
    {
        $user = auth()->user();
        if (!$user)
            return redirect('login');

        $html = $request->input('resume_html');
        $resume_title = $request->input('resume_title', 'NEON_RESUME');
        $token = config('services.browserless.token');

        // 1. Credit Check
        if ($user->pdf_exports_used >= $user->pdf_export_balance) {
            return back()->with('error', 'CREDIT_INSUFFICIENT');
        }

        try {
            $cleanName = Str::slug($resume_title) . '.pdf';

            // 2. API Request to Browserless
            $curl = curl_init();
            curl_setopt_array($curl, [
                CURLOPT_URL => "https://production-sfo.browserless.io/pdf?token=" . $token,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_POST => true,
                CURLOPT_POSTFIELDS => json_encode([
                    "html" => $html,
                    "options" => [
                        "printBackground" => true,
                        "format" => "A4"
                    ],
                    "gotoOptions" => ["waitUntil" => "networkidle0"]
                ]),
                CURLOPT_HTTPHEADER => ["Content-Type: application/json"],
                CURLOPT_TIMEOUT => 60,
            ]);

            $pdfBinary = curl_exec($curl); // Data is saved here
            $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
            curl_close($curl);

            if ($httpCode !== 200 || !$pdfBinary) {
                return back()->with('error', 'BROWSER_ENGINE_FAILURE');
            }

            // 3. Size Calculation (Fixed variable name to $pdfBinary)
            $sizeInBytes = strlen($pdfBinary);

            if ($sizeInBytes === 0) {
                return back()->with('error', 'GENERATION_FAILED: Empty file received.');
            }

            $formattedSize = $sizeInBytes >= 1048576
                ? round($sizeInBytes / 1048576, 2) . ' MB'
                : round($sizeInBytes / 1024, 2) . ' KB';

            // 4. Upload to Cloudflare R2
            $fileName = Str::slug($resume_title) . '_' . time() . '.pdf';
            $fullPath = 'resumes/user_' . $user->id . '/' . $fileName;

            \Storage::disk('s3')->put($fullPath, $pdfBinary);
            $publicUrl = \Storage::disk('s3')->url($fullPath);

            // 5. Record in Database
            $download = new Download();
            $download->user_id = $user->id;
            $download->file_path = $publicUrl;
            $download->file_name = $fileName;
            $download->file_size = $formattedSize; // This will now work correctly
            $download->save();

            // 6. Deduct Credit
            $user->increment('pdf_exports_used');

            // 7. Return Download
            return response($pdfBinary)
                ->header('Content-Type', 'application/pdf')
                ->header('Content-Disposition', 'attachment; filename="' . $cleanName . '"');

        } catch (\Exception $e) {
            \Log::error("Cloudflare Upload Error: " . $e->getMessage());
            return back()->with('error', 'SYSTEM_SYNC_ERROR');
        }
    }


    public function apiDestroy($id)
    {
        $resume = Download::where('id', $id)
            ->where('user_id', auth()->id())
            ->firstOrFail();

        // 1. Delete from Cloudflare R2
        $path = parse_url($resume->file_path, PHP_URL_PATH);
        \Storage::disk('s3')->delete(ltrim($path, '/'));

        // 2. Delete from Database
        $resume->delete();

        return response()->json([
            'success' => true,
            'message' => 'Delete Successful'
        ]);
    }


    public function downloadLocal($id)
    {
        // 1. Fetch record and verify ownership
        $resume = Download::where('id', $id)
            ->where('user_id', auth()->id())
            ->firstOrFail();

        try {
            // 2. Get the file content from R2
            $path = parse_url($resume->file_path, PHP_URL_PATH);
            $cleanPath = ltrim($path, '/');

            if (!\Storage::disk('s3')->exists($cleanPath)) {
                return back()->with('error', 'FILE_NOT_FOUND_ON_CLOUD');
            }

            $fileContent = \Storage::disk('s3')->get($cleanPath);

            // 3. Prepare a clean filename
            $fileName = Str::slug($resume->file_name) . '.pdf';

            // 4. Return the response as an ATTACHMENT
            return response($fileContent)
                ->header('Content-Type', 'application/pdf')
                ->header('Content-Disposition', 'attachment; filename="' . $fileName . '"')
                ->header('Content-Length', strlen($fileContent));

        } catch (\Exception $e) {
            \Log::error("Download Error: " . $e->getMessage());
            return back()->with('error', 'SYSTEM_TRANSFER_FAILURE');
        }
    }
    public function ai_suggestions(Request $request)
    {
        $userInput = strtolower(trim($request->input('query'))); // e.g. "Lar"
        $role = $request->input('role'); // e.g. "Full Stack Developer"

        // 1. Get skills specifically for the user's CURRENT ROLE
        $roleSkills = [];
        if ($role) {
            $roleRecord = SkillSuggestion::where('name', 'LIKE', "%{$role}%")->first();
            if ($roleRecord) {
                $roleSkills = $roleRecord->skills;
            }
        }

        // 2. Global Search: Find ANY profession that contains the user's query
        // We use a raw query or a collection filter to find partial matches in JSON
        $allProfessions = SkillSuggestion::all();
        $globalMatches = [];

        foreach ($allProfessions as $record) {
            foreach ($record->skills as $skill) {
                // Check if what they typed matches any skill in the DB
                if (str_contains(strtolower($skill), $userInput)) {
                    $globalMatches[] = $skill;
                }
            }
        }

        // 3. Merge and Prioritize
        // We want the current role's skills to appear first, followed by global matches
        $finalSuggestions = array_unique(array_merge($roleSkills, $globalMatches));

        // 4. Final Filter: Only keep skills that match the typing (if typing exists)
        if ($userInput) {
            $finalSuggestions = array_filter($finalSuggestions, function ($skill) use ($userInput) {
                return str_contains(strtolower($skill), $userInput);
            });
        }

        return response()->json([
            'success' => true,
            // array_values resets indices [0, 1, 2...] for clean JS consumption
            'suggestions' => array_values(array_slice($finalSuggestions, 0, 10)),
            'count' => count($finalSuggestions)
        ]);
    }
 

}
