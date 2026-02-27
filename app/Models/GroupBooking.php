<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GroupBooking extends Model
{
    protected $guarded = [];

    protected $casts = [
        'discount_percent' => 'decimal:2',
        'subtotal_amount' => 'decimal:2',
        'total_amount' => 'decimal:2',
        'verified_at' => 'datetime',
    ];

    public function registrations()
    {
        return $this->hasMany(Registration::class);
    }

    public function verifiedBy()
    {
        return $this->belongsTo(User::class, 'verified_by');
    }

    /**
     * Calculate group discount percentage based on member count.
     */
    public static function discountForSize(int $count): float
    {
        if ($count >= 10)
            return 20.0;
        if ($count >= 5)
            return 10.0;
        if ($count >= 2)
            return 5.0;
        return 0.0;
    }
}
