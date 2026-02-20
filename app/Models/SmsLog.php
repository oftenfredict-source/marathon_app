<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SmsLog extends Model
{
    protected $fillable = [
        'runner_id',
        'phone_number',
        'message',
        'sms_type',
        'status',
        'api_response',
        'sent_by',
        'sent_at',
    ];

    protected $casts = [
        'sent_at' => 'datetime',
    ];

    /**
     * Get the runner associated with this SMS.
     */
    public function runner()
    {
        return $this->belongsTo(Runner::class);
    }

    /**
     * Get the user who sent this SMS.
     */
    public function sender()
    {
        return $this->belongsTo(User::class, 'sent_by');
    }
}
