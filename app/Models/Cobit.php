<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cobit extends Model
{
    use HasFactory;

    protected $fillable = ['evaluasi_id', 'indikator_id', 'pertanyaan_id', 'kematangan_indikator', 'ada', 'nilai', 'catatan', 'bukti_pendukung'];

    public function evaluasi()
    {
        return $this->belongsTo(Evaluasi::class);
    }

    public function indikator()
    {
        return $this->belongsTo(IndikatorSPBE::class);
    }

    public function pertanyaan()
    {
        return $this->belongsTo(Pertanyaan::class);
    }
}
