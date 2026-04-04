<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ResumeScoreService
{
    /**
     * Analyze resume data for ATS compliance and quality.
     */
    public function analyze(array $resumeData)
    {
        $prompt = $this->buildAnalysisPrompt($resumeData);

        try {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . config('services.openai.key'),
                'Content-Type' => 'application/json'
            ])->post('https://api.openai.com/v1/chat/completions', [
                        'model' => 'gpt-4o-mini', // Optimized for speed and JSON
                        'messages' => [
                            [
                                'role' => 'system',
                                'content' => 'You are an elite ATS (Applicant Tracking System) Audit Bot. Your goal is to provide a harsh but fair assessment of resume data. You must return ONLY valid JSON.'
                            ],
                            [
                                'role' => 'user',
                                'content' => $prompt
                            ]
                        ],
                        'response_format' => ['type' => 'json_object'],
                        'temperature' => 0.3, // Lower temperature for more consistent scoring
                    ]);

            if (!$response->successful()) {
                Log::error('ATS_SCAN_FAILED', ['body' => $response->body()]);
                throw new \Exception("Analysis engine offline.");
            }

            $result = $response->json();
            $content = $result['choices'][0]['message']['content'] ?? null;

            return json_decode($content, true);

        } catch (\Exception $e) {
            Log::error('ATS_SERVICE_ERROR: ' . $e->getMessage());
            return [
                'score' => 0,
                'status' => 'Error',
                'improvements' => ['System was unable to analyze at this time.'],
                'missing_keywords' => []
            ];
        }
    }

    private function buildAnalysisPrompt(array $data): string
    {
        return "
        ### TASK
        Audit the following resume data for ATS (Applicant Tracking System) optimization.
        
        ### EVALUATION CRITERIA
        1. **Impact**: Are bullet points result-oriented?
        2. **Brevity**: Is the summary concise?
        3. **Completeness**: Are all critical professional fields present?
        4. **Keyword Density**: Identify missing industry-standard keywords based on the job title.

        ### OUTPUT JSON SCHEMA (STRICT)
        {
            \"score\": (integer 0-100),
            \"status\": \"(Red | Yellow | Green)\",
            \"missing_keywords\": [\"list of 5 essential keywords missing\"],
            \"improvements\": [\"3 short, actionable tips to increase score\"],
            \"analysis_summary\": \"one sentence overview\"
        }

        ### RESUME DATA
        " . json_encode($data);
    }
}