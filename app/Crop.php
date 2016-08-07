<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Crop extends Model
{
    protected $fillable = ['name'];	
    public function farm()
    {
        return $this->belongsTo(Farm::class);
    }
}
