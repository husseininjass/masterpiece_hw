<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class users extends Model
{
    use HasFactory;
    use softDeletes;
    protected $fillable = [
        'id',
        'firstName',
        'lastName',
        'email',
        'password',
        'photo',
        'phoneNumber',
        'city',
        'address',
        'userState',
        'status',
        
    ];
}
