<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SmsLog;
use Illuminate\Http\Request;

class SmsLogController extends Controller
{
    /**
     * Get a list of SMS logs with runner details.
     */
    public function index(Request $request)
    {
        $query = SmsLog::with('runner')
            ->orderBy('created_at', 'desc');

        if ($request->has('status')) {
            $query->where('status', $request->status);
        }

        if ($request->has('type')) {
            $query->where('sms_type', $request->type);
        }

        $logs = $query->paginate(50);

        return response()->json($logs);
    }

    /**
     * Get SMS statistics for the dashboard.
     */
    /**
     * Get SMS statistics for the dashboard.
     */
    public function getStats()
    {
        return response()->json([
            'total' => SmsLog::count(),
            'sent' => SmsLog::where('status', 'sent')->count(),
            'failed' => SmsLog::where('status', 'failed')->count(),
        ]);
    }

    /**
     * Resend a failed SMS message.
     */
    public function resend($id)
    {
        $log = SmsLog::findOrFail($id);

        if ($log->status === 'sent') {
            return response()->json(['message' => 'SMS already sent successfully'], 400);
        }

        $smsService = app(\App\Services\SmsService::class);
        $result = $smsService->sendSms($log->phone_number, $log->message);

        // Update the log with the new attempt result
        $log->update([
            'status' => $result['success'] ? 'sent' : 'failed',
            'api_response' => json_encode($result),
            'sent_at' => now(),
            'sent_by' => auth()->id()
        ]);

        if ($result['success']) {
            return response()->json(['message' => 'SMS resent successfully']);
        } else {
            return response()->json([
                'message' => 'Failed to resend SMS: ' . ($result['error'] ?? 'Unknown API error'),
                'error' => $result['error'] ?? null
            ], 500);
        }
    }
}
