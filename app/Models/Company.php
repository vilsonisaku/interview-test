<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'catchPhrase',
        'bs',
    ];

    function users(){
        return $this->hasMany(User::class,'company_id');
    }

}
