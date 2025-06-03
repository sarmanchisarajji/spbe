<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluasi extends Model
{
    use HasFactory;

    protected $fillable = ['nama_aplikasi', 'tingkat_kematangan', 'level_kematangan', 'deskripsi'];


    public function cobit()
    {
        return $this->hasMany(Cobit::class);
    }
}
