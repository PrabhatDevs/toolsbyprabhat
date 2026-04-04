<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;



class OpenAIService
{

    public function generate(array $data)
    {

        $prompt = "
### ROLE
You are a professional ATS Resume Strategy Expert specialized in semantic refinement and industry-specific optimization for all professional sectors.

### TASK
Analyze and polish the provided resume data into a high-impact, professional JSON format. Your goal is to improve the professional phrasing without altering the factual content.

### STRICT OPERATIONAL CONSTRAINTS (CRITICAL)
1. **ZERO FABRICATION**: You are strictly forbidden from adding responsibilities, technologies, tools, or achievements not present in the input. If the user did not mention a specific skill (e.g., 'payment gateways' or 'patient care'), do NOT include it.
2. **NO HALLUCINATION**: Do not invent company names, degrees, or metrics to fill space.
3. **OUTPUT FORMAT**: Return ONLY raw, valid JSON. No Markdown code blocks (no ```json). No conversational preamble.
4. **EMPTY FIELDS**: If a section is empty in the input, it must remain empty in the output.
5. **DATE FORMAT**: Return duration dates in format 'February 2014 - April 2025 or Present'.
6. **Text Style**: Return sentences or texts in Capitalized form where needed.
7. Optimize each descriptions a bit.

### CONTENT OPTIMIZATION GUIDELINES
- **Action Verbs**: Begin every bullet point with a strong, industry-appropriate action verb (e.g., 'Engineered' for Tech, 'Administered' for Management, 'Facilitated' for Education).
- **Description Arrays**: Parse all 'description' fields. If they are strings or comma-separated, split them into a JSON array of polished, standalone professional sentences.
- **Dynamic Skill Categorization**: 
    - For **Technical Roles**: Categorize skills into 'Languages', 'Frameworks', 'Tools', etc.
    - For **Non-Technical Roles**: Categorize skills into relevant industry buckets (e.g., for Medical: 'Clinical Skills', 'Certifications'; for Teaching: 'Pedagogy', 'Classroom Management').
    - If the input 'skills' are a simple list, group them into the most professional category names for that specific career.

### REQUIRED JSON SCHEMA
{
  \"basic\": {
    \"first_name\": \"string\", \"last_name\": \"string\", \"email\": \"string\", \"phone\": \"string\",
    \"location\": \"string\", \"portfolio\": \"string\", \"linkedin\": \"string\", \"github\": \"string\"
  },
  \"summary\": \"string\",
  \"core_competencies\": [\"string\"],
  \"skills_by_category\": {
    \"Category Name (e.g. Technical Skills or Clinical Expertise)\": \"string list\",
    \"Sub Category (e.g. Frameworks or Soft Skills)\": \"string list\"
  },
  \"employment\": [
    { \"job_title\": \"string\", \"subtitle\": \"string\", \"duration\": \"string\", \"description\": [\"string\"] }
  ],
  \"projects\": [
    { \"title\": \"string\", \"description\": [\"string\"] }
  ],
  \"education\": [
    { \"degree\": \"string\", \"school\": \"string\", \"duration\": \"string\", \"description\": \"string\" }
  ]
}

### INPUT DATA
" . json_encode($data, JSON_PRETTY_PRINT) . "
";

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . config('services.openai.key'),
            'Content-Type' => 'application/json'
        ])->post('https://api.openai.com/v1/responses', [

                    'model' => 'gpt-4.1-mini',

                    'input' => [
                        [
                            'role' => 'system',
                            'content' => 'You are a professional ATS resume writer. Always return strictly valid JSON only.'
                        ],
                        [
                            'role' => 'user',
                            'content' => $prompt
                        ]
                    ],

                    'temperature' => 0.4,

                    // ✅ NEW CORRECT FORMAT
                    'text' => [
                        'format' => [
                            'type' => 'json_object'
                        ]
                    ]
                ]);

        if (!$response->successful()) {
            \Log::error('OpenAI API failed', [
                'status' => $response->status(),
                'body' => $response->body()
            ]);

            throw new \Exception("OpenAI API request failed.");
        }

        $raw = $response->json();

        // 🔥 Validate structure
        if (!isset($raw['output'][0]['content'][0]['text'])) {
            \Log::error('Unexpected OpenAI response structure', $raw);
            throw new \Exception("Invalid AI response format.");
        }

        $text = trim($raw['output'][0]['content'][0]['text']);

        // 🔥 Decode JSON safely
        $aiData = json_decode($text, true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            \Log::error('Invalid JSON returned from OpenAI', [
                'raw_text' => $text
            ]);

            throw new \Exception("AI returned invalid JSON.");
        }

        return $aiData;
    }
}