<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Marathon extends Model
{
    protected $guarded = [];

    public function categories()
    {
        return $this->hasMany(RaceCategory::class);
    }
}
