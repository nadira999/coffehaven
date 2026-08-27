<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;

    protected $table = "pesanan";

    protected $fillable = [
        "pelanggan_id",
        "status",
        "total_harga",
        "catatan"
    ];

    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class, "pelanggan_id");
    }

    public function pesananDetail()
    {
        return $this->hasMany(PesananDetail::class, "pesanan_id");
    }

    public function pembayaran()
    {
        return $this->hasOne(Pembayaran::class, "pesanan_id");
    }
}