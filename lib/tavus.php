<?php
require __DIR__ . '/../vendor/autoload.php';

use Dotenv\Dotenv;

header('Content-Type: application/json');
header("Permissions-Policy: microphone=(), camera=()");

// Load environment variables
$dotenv = Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

// Get the POST data
$data = json_decode(file_get_contents('php://input'), true);

// Determine environment and get appropriate API keys
$environment = $_ENV['APP_ENV'] ?? 'local';
$apiKeys = [];

if ($environment === 'live') {
    // Use single live API key
    $apiKeys = [$_ENV['TAVUS_LIVE_API_KEY']];
} else {
    // Use multiple local API keys
    $apiKeys = explode(',', $_ENV['TAVUS_LOCAL_API_KEYS']);
}

// Tavus API configuration
$requestData = [
    'replica_id' => 'rbb0f535dd',
    'persona_id' => 'pd43ffef',
    'callback_url' => 'https://e8f9-182-184-138-168.ngrok-free.app/lib/tavus_wh.php',
    'conversation_name' => 'Math Tutoring Session',
    'conversational_context' => 'You are a friendly and patient virtual math tutor, guiding a 5th-grade student through various math concepts. Your goal is to make learning fun and engaging by explaining concepts in a simple, step-by-step manner, using real-world examples, encouragement, and interactive questions. Adapt your responses to the student’s level, ensuring they understand each step before moving forward.',
    'custom_greeting' => 'Hey there! I’m your math tutor, ready to make learning fun and easy. Let’s tackle your math questions together—step by step! What would you like help with today?',
    'properties' => [
        'max_call_duration' => 3600,
        'participant_left_timeout' => 60,
        'participant_absent_timeout' => 300,
        'enable_recording' => true,
        'enable_transcription' => true,
        'apply_greenscreen' => false,
        'language' => 'english',
    ],
];


// Try each API key until successful or exhausted
foreach ($apiKeys as $index => $apiKey) {
    $curl = curl_init();

    curl_setopt_array($curl, [
        CURLOPT_URL => 'https://tavusapi.com/v2/conversations',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => json_encode($requestData),
        CURLOPT_HTTPHEADER => [
            'Content-Type: application/json',
            "x-api-key: $apiKey"
        ],
    ]);

    $response = curl_exec($curl);
    $err = curl_error($curl);
    $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);

    curl_close($curl);

    if ($err) {
        continue; // Try next API key if there's a cURL error
    }

    $responseData = json_decode($response, true);

    // Handle various API response scenarios
    if (isset($responseData['message'])) {
        switch ($responseData['message']) {
            case 'User has reached maximum concurrent conversations':
            case 'The user is out of conversational credits':
                unset($apiKeys[$index]);
                continue 2; // Try next API key
            default:
                if (!isset($responseData['conversation_id'])) {
                    unset($apiKeys[$index]);
                    continue 2; // Try next API key
                }
        }
    }

    // Successful response - manage session and return
    if (!isset($_SESSION)) {
        session_start();
    }

    $_SESSION['api_key'] = $apiKey;

    // Add debug information for local environment
    if ($environment === 'local') {
        $responseData['debug'] = [
            'used_api_key' => $apiKey,
            'environment' => $environment,
            'http_code' => $httpCode
        ];
    }   
    echo json_encode($responseData);
    exit();
}

// If all API keys are exhausted
echo json_encode([
    'status' => 'error',
    'message' => 'All API keys exhausted. No conversation created.',
    'environment' => $environment
]);