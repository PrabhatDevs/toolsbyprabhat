<?php

namespace App\Http\Controllers;

use App\Services\ResumeScoreService;
use Illuminate\Http\Request;

class ResumeScanController extends Controller
{
    protected $atsService;

    public function __construct(ResumeScoreService $atsService)
    {
        $this->atsService = $atsService;
    }

    public function score_check(Request $request)
    {
        // 1. Validation: Ensure the request isn't empty
        // You can add more specific rules based on your form fields
        if (empty($request->all())) {
            return response()->json([
                'success' => false,
                'message' => 'No resume data provided for analysis.'
            ], 422);
        }
        if (auth()->user()->used_credits <= 0) {
            return response()->json([
                'success' => false,
                'message' => 'You have exhausted your free credits. Please upgrade to continue using the resume analysis feature.'
            ], 403);
        }

        try {
            // 2. Process with AI Service
            // We set a timeout in the Service, but the controller handles the outcome
            $analysis = $this->atsService->analyze($request->all());

            // 3. Verify AI returned expected keys
            if (!isset($analysis['score'])) {
                throw new \Exception("AI Analysis returned an invalid format.");
            }
            auth()->user()->increment('used_credits');
            // 4. Return Success Response
            return response()->json([
                'success' => true,
                'score' => $analysis['score'],
                'status' => $analysis['status'] ?? 'Unknown',
                'tips' => $analysis['improvements'] ?? [],
                'keywords' => $analysis['missing_keywords'] ?? [],
                'summary' => $analysis['analysis_summary'] ?? '',
                'used_credits' => auth()->user()->used_credits,
            ]);

        } catch (\Illuminate\Http\Client\ConnectionException $e) {
            // Handle Timeout/Network issues specifically
            \Log::error("ATS Scan Timeout: " . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'The AI server is taking too long to respond. Please try again.'
            ], 504);

        } catch (\Exception $e) {
            // Handle all other errors (API key issues, JSON parsing, etc.)
            \Log::error("ATS Scan Error: " . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'System error during analysis. Our AI Architect is resting.'
            ], 500);
        }
    }
}
