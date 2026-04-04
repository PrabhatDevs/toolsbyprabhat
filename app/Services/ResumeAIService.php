<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class ResumeAIService
{
    public function generate(array $data)
    {
       
        $prompt = "
You are a professional ATS resume writer.

TASK:
Improve and optimize the resume content provided below.

IMPORTANT:
- Return ONLY valid JSON.
- Do NOT return HTML.
- Do NOT return markdown.
- Do NOT return explanations.
- Do NOT wrap inside code blocks.
- Output must be pure JSON.
- Preserve the exact JSON structure provided.
- Do NOT invent information.
- Do NOT add new sections.
- Do NOT fabricate company names, dates, achievements, or metrics.
- If a field is empty, keep it empty.
- Improve wording professionally.
- Use strong action verbs.
- Make content ATS-friendly.
- Keep tone professional and concise.

REQUIRED OUTPUT STRUCTURE (MUST MATCH EXACTLY):

{
  \"basic\": {
    \"first_name\": \"string\",
    \"last_name\": \"string\",
    \"job_target\": \"string\",
    \"email\": \"string\",
    \"phone\": \"string\",
    \"city\": \"string\",
    \"country\": \"string\",
    \"portfolio\": \"string\",
    \"photo\": \"string|null\"
  },
  \"summary\": \"string\",
  \"employment\": [
    {
      \"job_title\": \"string\",
      \"employer\": \"string\",
      \"start_date\": \"string\",
      \"end_date\": \"string\",
      \"city\": \"string\",
      \"description\": \"string\"
    }
  ],
  \"education\": [
    {
      \"school\": \"string\",
      \"degree\": \"string\",
      \"start_date\": \"string\",
      \"end_date\": \"string\",
      \"city\": \"string\",
      \"description\": \"string\"
    }
  ],
  \"skills\": [
    {
      \"name\": \"string\",
      \"level\": \"number\"
    }
  ],
  \"strengths\": [\"string\"]
}

RESUME DATA TO IMPROVE:

" . json_encode($data, JSON_PRETTY_PRINT) . "

INSTRUCTIONS:
- Rewrite summary professionally.
- Rewrite employment descriptions only.
- Do not change dates or employer names.
- Improve skill names wording if needed.
- Improve strengths wording.
- Keep JSON structure identical.

FINAL REMINDER:
Return ONLY valid JSON.
";
        $response = Http::withHeaders([
            'Content-Type' => 'application/json'
        ])->post(
                "https://generativelanguage.googleapis.com/v1beta/models/gemini-2.0-flash:generateContent?key=" . config('services.gemini.key'),
                [
                    "contents" => [
                        [
                            "role" => "user",
                            "parts" => [
                                ["text" => $prompt]
                            ]
                        ]
                    ],
                    "generationConfig" => [
                        "temperature" => 0.4,
                        "maxOutputTokens" => 2000
                    ]
                ]
            );

        // 🔥 API Failure Check
        if (!$response->successful()) {
            \Log::error('Gemini API failed', [
                'status' => $response->status(),
                'body' => $response->body()
            ]);
            throw new \Exception("AI API request failed.");
        }

        $raw = $response->json();

        // 🔥 Structure Validation
        if (!isset($raw['candidates'][0]['content']['parts'][0]['text'])) {
            \Log::error('Unexpected Gemini response structure', $raw);
            throw new \Exception("Invalid AI response format.");
        }

        $text = $raw['candidates'][0]['content']['parts'][0]['text'];

        // 🔥 Remove possible markdown wrappers
        $text = trim($text);
        $text = preg_replace('/```json|```/', '', $text);

        // 🔥 Decode JSON safely
        $aiData = json_decode($text, true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            \Log::error('Invalid JSON returned from AI', [
                'raw_text' => $text
            ]);
            throw new \Exception("AI returned invalid JSON.");
        }

        // ✅ Success — return structured array
        return $aiData;
    }
}