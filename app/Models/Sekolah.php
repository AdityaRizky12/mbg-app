<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sekolah extends Model
{
    use HasFactory;

    protected $table = 'sekolah';
    protected $fillable = ['nama_sekolah', 'alamat', 'jumlah_siswa'];
    public function distribusi()
    {
        return $this->hasMany(Distribusi::class);
    }
}