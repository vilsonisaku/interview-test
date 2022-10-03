<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAddress extends Model
{
    use HasFactory;

    protected $fillable = [
        'street',
        'suite',
        'city',
        'zipcode',
        'geo',
    ];

    function user(){
        return $this->hasMany(User::class,'user_id');
    }

}
