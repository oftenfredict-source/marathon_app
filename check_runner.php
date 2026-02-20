<?php

require __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use App\Models\Runner;

$runner = Runner::where('email', 'allyprof7@gmail.com')->first();

if ($runner) {
    echo "Runner Found:\n";
    echo "Name: " . $runner->first_name . " " . $runner->last_name . "\n";
    echo "Email: " . $runner->email . "\n";
    echo "Gender: " . $runner->gender . "\n";
    echo "DOB: " . json_encode($runner->dob) . "\n";
    echo "T-Shirt: " . json_encode($runner->t_shirt_size) . "\n";
    echo "Raw Attributes: " . json_encode($runner->getAttributes(), JSON_PRETTY_PRINT) . "\n";
} else {
    echo "Runner not found.\n";
}
