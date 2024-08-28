<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class Customer extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $hidden = [
        'password',
    ];

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }

    public function orders()
    {
        return $this->belongsTo(Booking::class);
    }

}
