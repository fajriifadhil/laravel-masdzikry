<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model {
    use HasFactory;

    protected $table = "admin";

    protected $fillable = [
        'nama_lengkap',
        'username',
        'password',
        'email'
    ];
}
