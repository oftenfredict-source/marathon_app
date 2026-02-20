<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Registration;
use App\Http\Controllers\RegistrationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TestVerifyPayment extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:test-verify-payment {registration_id} {reference=TEST_REF_123}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Test the payment verification flow and SMS notification for a specific registration';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $id = $this->argument('registration_id');
        $reference = $this->argument('reference');

        $this->info("Starting payment verification test for Registration ID: {$id}");
        $this->info("Using Reference Number: {$reference}");

        $registration = Registration::find($id);

        if (!$registration) {
            $this->error("Registration with ID {$id} not found.");
            return 1;
        }

        if ($registration->status === 'paid') {
            $this->warn("This registration is already marked as PAID (Bib: {$registration->bib_number}).");
            if (!$this->confirm('Do you want to re-run the verification logic? (This will assign a NEW bib number)')) {
                return 0;
            }
        }

        // We will call the controller method directly to ensure the exact same logic is executed
        // We need to mock a request
        $request = new Request([
            'registration_id' => $id,
            'payment_reference' => $reference
        ]);

        $controller = app(RegistrationController::class);

        try {
            $this->info("Calling verifyPayment logic...");
            $response = $controller->verifyPayment($request);
            $data = json_decode($response->getContent(), true);

            if ($response->getStatusCode() === 200) {
                $this->success("Verification Successful!");
                $this->info("Assigned Bib Number: " . ($data['bib_number'] ?? 'N/A'));
                $this->info("Check Laravel logs or SMS logs to confirm SMS was sent to: " . $registration->runner->phone);
            } else {
                $this->error("Verification Failed!");
                $this->error("Error Message: " . ($data['message'] ?? 'Unknown error'));
                if (isset($data['errors'])) {
                    $this->error("Validation Errors: " . json_encode($data['errors']));
                }
            }
        } catch (\Exception $e) {
            $this->error("An exception occurred: " . $e->getMessage());
            Log::error('Test command failed', ['error' => $e->getMessage()]);
        }

        return 0;
    }

    /**
     * Helper to show success messages
     */
    private function success($message)
    {
        $this->line("<fg=green;options=bold>{$message}</>");
    }
}
