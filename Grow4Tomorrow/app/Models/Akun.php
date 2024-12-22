<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable; // Jika Anda menggunakan fitur otentikasi

class Akun extends Authenticatable // Extends Authenticatable untuk otentikasi

{
    use HasFactory;
    
    protected $table = 'akun';  // Nama tabel yang digunakan
    protected $fillable = ['email', 'name', 'password'];  // Kolom yang dapat diisi langsung
    protected $hidden = ['password'];  // Sembunyikan password dari hasil query
}

