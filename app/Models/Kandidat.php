<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kandidat extends Model
{
    use HasFactory;
    protected $table='kandidat';
    protected $fillable = [
        'nim', 'nama', 'id_user'
    ];
    
    public function atribut()
    {
        return $this->hasMany(Atribut::class, 'kandidat_id');
    }

    public function currentAtribut($kriteria_id)
    {
        return $this->atribut->filter(function ($atr) use ($kriteria_id)  {
            return $kriteria_id==$atr['kriteria_id'];
        })->first();
    }
}
