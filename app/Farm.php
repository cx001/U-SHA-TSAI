<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Farm extends Model
{
    protected $fillable = ['name','lati','lngi','lightness'];
	public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function crops()
    {
        return $this->hasMany(Crop::class);
    }
}
