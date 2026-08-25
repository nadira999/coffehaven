<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Pelanggan extends Authenticatable
{
    use HasFactory;

    protected $table = "pelanggan";

    protected $fillable = [
        "nama",
        "email",
        "password",
        "no_telepon",
        "alamat"
    ];

    protected $hidden = [
        "password"
    ];

    public function pesanan()
    {
        return $this->hasMany(Pesanan::class, "pelanggan_id");
    }
}