<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pengambilan extends Model
{
    use HasFactory;

    protected $table = "pengambilans";
    protected $primaryKey = "id";

    protected $fillable = [
        "idAmbil", "tanggal", "noAnggota", "jumlah", "userId"
    ];
}
