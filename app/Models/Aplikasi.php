<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aplikasi extends Model
{
    use HasFactory;
        protected $fillable = ['nama_aplikasi', 'tingkat_kematangan','level_kematangan', 'deskripsi'];

    public function penilaian()
    {
        return $this->hasMany(Penilaian::class);
    }
}
