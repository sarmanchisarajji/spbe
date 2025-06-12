<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pertanyaan extends Model
{
    use HasFactory;

    protected $fillable = ['indikator_id', 'level', 'atribut_proses', 'pertanyaan'];

    public function indikator()
    {
        return $this->belongsTo(IndikatorSPBE::class);
    }

    public function cobit()
    {
        return $this->hasMany(Cobit::class);
    }
}
