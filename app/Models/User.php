<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'username',
        'phone_number',
        'password_hash',
        'profile_picture',
        'last_seen'
    ];

    protected $table = 'user';
    

}
