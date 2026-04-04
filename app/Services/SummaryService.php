<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;



class SummaryService
{
    public function expandSummary(string $shortSummary)
    {
        $prompt = "
You are a senior ATS resume writing expert.

TASK:
Expand the short professional summary provided below into a highly professional, ATS-optimized, humanized summary.

RULES:
- Keep it realistic.
- Do NOT invent fake companies or achievements.
- Do NOT fabricate metrics.
- Make it impactful and professional.
- 3–5 strong sentences.
- Use strong action verbs.
- Make it ATS-friendly.
- Return ONLY valid JSON.
- No markdown.
- No explanations.
- Output must be pure JSON.

FORMAT:

{
  \"summary\": \"string\"
}

SHORT SUMMARY:
\"{$shortSummary}\"

Return ONLY valid JSON.
";

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . config('services.openai.key'),
            'Content-Type' => 'application/json'
        ])->post('https://api.openai.com/v1/responses', [

                    'model' => 'gpt-4.1-mini',

                    'input' => [
                        [
                            'role' => 'system',
                            'content' => 'You expand short resume summaries professionally. Output strictly valid JSON only.'
                        ],
                        [
                            'role' => 'user',
                            'content' => $prompt
                        ]
                    ],

                    'temperature' => 0.4,

                    'text' => [
                        'format' => [
                            'type' => 'json_object'
                        ]
                    ]
                ]);

        if (!$response->successful()) {
            throw new \Exception("OpenAI API request failed.");
        }

        $raw = $response->json();

        if (!isset($raw['output'][0]['content'][0]['text'])) {
            throw new \Exception("Invalid AI response format.");
        }

        $text = trim($raw['output'][0]['content'][0]['text']);

        $decoded = json_decode($text, true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new \Exception("AI returned invalid JSON.");
        }

        return $decoded;
    }
}