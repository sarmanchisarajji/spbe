<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cobit extends Model
{
    use HasFactory;

    protected $fillable = ['evaluasi_id', 'indikator_id', 'kematangan_indikator', 'level', 'ada', 'nilai', 'proses_atribut', 'catatan', 'bukti_pendukung'];

    public function evaluasi()
    {
        return $this->belongsTo(Evaluasi::class);
    }

    public function indikator()
    {
        return $this->belongsTo(IndikatorSPBE::class);
    }
}
