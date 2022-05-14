<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;
    protected $table="mahasiswa";
    protected $fillable = [
        'id_user', 'nim_mhs', 'nama_mhs', 'cv', 'transkrip_nilai', 'sk', 'foto', 'status'
    ];
}
