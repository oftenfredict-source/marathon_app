<?php

require __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use App\Services\SmsService;

$smsService = new SmsService();

$phoneNumber = '+255744341239';
$message = "Hello! This is a test SMS from Swahili Marathon Registration System. Your SMS integration is working correctly!";

echo "Sending test SMS to {$phoneNumber}...\n\n";

$result = $smsService->sendSms($phoneNumber, $message);

echo "=== SMS SEND RESULT ===\n";
echo "Success: " . ($result['success'] ? 'YES' : 'NO') . "\n";
echo "HTTP Code: " . ($result['http_code'] ?? 'N/A') . "\n";

if ($result['error']) {
    echo "Error: " . $result['error'] . "\n";
}

if ($result['response']) {
    echo "\nAPI Response:\n";
    echo $result['response'] . "\n";
}

if (isset($result['response_data'])) {
    echo "\nParsed Response Data:\n";
    print_r($result['response_data']);
}

echo "\n=== END ===\n";
