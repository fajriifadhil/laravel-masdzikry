<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MetodePembayaran extends Model {
    use HasFactory;

    protected $table = "metode_pembayaran";

    protected $fillable = [
        'foto',
        'metode',
        'nama',
        'kode_bank',
        'tipe'
    ];
}