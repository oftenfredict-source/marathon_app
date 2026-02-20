<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    protected $guarded = [];

    public function runner()
    {
        return $this->belongsTo(Runner::class);
    }

    public function category()
    {
        return $this->belongsTo(RaceCategory::class, 'category_id');
    }

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }
}
