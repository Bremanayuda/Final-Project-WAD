<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable; 

class Akun extends Authenticatable 

{
    use HasFactory;
    
    protected $table = 'akun';  
    protected $fillable = ['email', 'name', 'password'];  
    protected $hidden = ['password', 'remember_token'];
    
}

