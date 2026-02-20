<?php

require __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use App\Models\User;
use Illuminate\Support\Facades\Hash;

echo "=== Creating Admin User ===\n\n";

try {
    // Check if admin already exists
    $existingAdmin = User::where('email', 'admin@smrms.com')->first();

    if ($existingAdmin) {
        echo "⚠️  Admin user already exists!\n";
        echo "Email: admin@smrms.com\n";
        echo "Updating password to: admin123\n\n";

        $existingAdmin->update([
            'password' => Hash::make('admin123')
        ]);

        echo "✓ Password updated successfully!\n";
    } else {
        echo "Creating new admin user...\n";

        $admin = User::create([
            'name' => 'Admin User',
            'email' => 'admin@smrms.com',
            'password' => Hash::make('admin123'),
        ]);

        echo "✓ Admin user created successfully!\n";
        echo "ID: {$admin->id}\n";
    }

    echo "\n=== Admin Login Credentials ===\n";
    echo "Email: admin@smrms.com\n";
    echo "Password: admin123\n";
    echo "\nLogin at: http://127.0.0.1:8000/login\n";
    echo "Admin Panel: http://127.0.0.1:8000/admin/registrations\n";

} catch (Exception $e) {
    echo "✗ ERROR: " . $e->getMessage() . "\n";
    echo "Stack trace:\n" . $e->getTraceAsString() . "\n";
}
