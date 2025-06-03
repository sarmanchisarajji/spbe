<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AspekSPBE extends Model
{
    use HasFactory;

    protected $fillable = ['nama_aspek'];

    public function indikator()
    {
        return $this->hasMany(IndikatorSPBE::class);
    }
}
