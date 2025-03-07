<?php
require __DIR__ . '/../vendor/autoload.php';

use Dotenv\Dotenv;

header('Content-Type: application/json');

// Load environment variables
$dotenv = Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

// Get the POST data
$data = json_decode(file_get_contents('php://input'), true);

$name = 'Khan';
$email = 'khan@gmail.com';
$textContent = 'This is my document';

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
    'replica_id' => 'r0b262e2065e',
    'persona_id' => 'p2fbd605',
    'callback_url' => 'https://e8f9-182-184-138-168.ngrok-free.app/lib/tavus_wh.php',
    'conversation_name' => 'A Meeting with ' . $name,
    'conversational_context' => 'You are about to talk to ' . $name . '. this my document you will explain this => ' . $textContent,
    'custom_greeting' => 'Hi ' . $name ,
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