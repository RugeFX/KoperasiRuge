<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pinjamanDetail extends Model
{
    use HasFactory;

    protected $table = "pinjaman_details";
    protected $primaryKey = "id";

    protected $fillable = [
        "idPinjam", "cicilan", "angsuran", "bunga", "tglBayar", "jumlahBayar"
    ];
}
