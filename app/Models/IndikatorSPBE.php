<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IndikatorSPBE extends Model
{
    use HasFactory;

    protected $fillable = ['aspek_id', 'nama_indikator', 'domain_cobit', 'nama_cobit'];

    public function aspek()
    {
        return $this->belongsTo(AspekSPBE::class);
    }

    public function cobit()
    {
        return $this->hasMany(Cobit::class);
    }
}
