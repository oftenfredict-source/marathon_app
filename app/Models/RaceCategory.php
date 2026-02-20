<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RaceCategory extends Model
{
    protected $guarded = [];

    public function marathon()
    {
        return $this->belongsTo(Marathon::class);
    }

    public function registrations()
    {
        return $this->hasMany(Registration::class, 'category_id');
    }
}
