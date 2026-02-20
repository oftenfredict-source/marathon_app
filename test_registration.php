<?php

require __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use App\Models\Runner;
use App\Models\Registration;
use App\Models\RaceCategory;

echo "=== Database Connection Test ===\n\n";

try {
    // Test 1: Check database connection
    DB::connection()->getPdo();
    echo "✓ Database connection: SUCCESS\n";

    // Test 2: Count existing records
    $runnerCount = Runner::count();
    $registrationCount = Registration::count();
    $categoryCount = RaceCategory::count();

    echo "✓ Current Runners: $runnerCount\n";
    echo "✓ Current Registrations: $registrationCount\n";
    echo "✓ Current Categories: $categoryCount\n\n";

    // Test 3: Try to create a test runner
    echo "=== Creating Test Runner ===\n";
    $runner = Runner::create([
        'first_name' => 'Test',
        'last_name' => 'Runner',
        'email' => 'test' . time() . '@example.com',
        'phone' => '+255712345678',
        'nationality' => 'Tanzanian',
        'region' => 'Dar es Salaam',
        'gender' => 'male',
        't_shirt_size' => 'M'
    ]);

    echo "✓ Runner created with ID: {$runner->id}\n";
    echo "✓ Email: {$runner->email}\n\n";

    // Test 4: Create a test registration
    if ($categoryCount > 0) {
        echo "=== Creating Test Registration ===\n";
        $category = RaceCategory::first();

        $registration = Registration::create([
            'runner_id' => $runner->id,
            'category_id' => $category->id,
            'type' => 'adult',
            'bib_number' => '10001',
            'status' => 'pending'
        ]);

        echo "✓ Registration created with ID: {$registration->id}\n";
        echo "✓ Bib Number: {$registration->bib_number}\n";
        echo "✓ Category: {$category->name}\n\n";
    }

    // Final count
    $newRunnerCount = Runner::count();
    $newRegistrationCount = Registration::count();

    echo "=== Final Counts ===\n";
    echo "Runners: $runnerCount → $newRunnerCount\n";
    echo "Registrations: $registrationCount → $newRegistrationCount\n";
    echo "\n✓✓✓ ALL TESTS PASSED ✓✓✓\n";

} catch (Exception $e) {
    echo "✗ ERROR: " . $e->getMessage() . "\n";
    echo "Stack trace:\n" . $e->getTraceAsString() . "\n";
}
