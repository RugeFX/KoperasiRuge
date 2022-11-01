<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jenisSimpanan extends Model
{
    use HasFactory;

    protected $table = "jenis_simpanans";
    protected $primaryKey = "id";

    protected $fillable = [
        "idJenis", "jenisSimpanan", "jumlah"
    ];
}
