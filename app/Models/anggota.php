<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class anggota extends Model
{
    use HasFactory;
    
    protected $table = "anggotas";
    protected $primaryKey = "id";

    protected $fillable = [
        "noAnggota", "namaAnggota", "jKelamin", "tempatLahir", "tglLahir", "alamat", "noTelpon", "noIdentitas", "password"
    ];
}
