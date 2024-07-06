<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model {
    use HasFactory;

    protected $table = "transaksi";

    protected $fillable = [
        'id_transaksi',
        'id_paket',
        'id_pelanggan',
        'id_metode_pembayaran',
        'no_transaksi',
        'kode_biller',
        'dibayar_pada',
        'status',
        'tanggal_kadaluarsa'
    ];
}
