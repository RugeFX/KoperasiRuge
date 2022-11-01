<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class simpanan extends Model
{
    use HasFactory;
    
    protected $table = "simpanans";
    protected $primaryKey = "id";

    protected $fillable = [
        'idSimpanan',"noTelpon", "tanggal", "noAnggota", "idJenis", "jumlah", "userId"
    ];
}
