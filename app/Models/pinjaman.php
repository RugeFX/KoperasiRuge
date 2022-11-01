<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pinjaman extends Model
{
    use HasFactory;

    protected $table = "pinjamen";
    protected $primaryKey = "id";

    protected $fillable = [
        "idPinjam", "tanggal", "noAnggota", "jumlah", "lama", "bunga", "userId"
    ];
}
