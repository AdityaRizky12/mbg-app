<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Distribusi extends Model
{
    use HasFactory;

    protected $table = 'distribusi';

    protected $fillable = ['sekolah_id', 'menu_id', 'tanggal_distribusi', 'jumlah_porsi', 'status'];

    public function sekolah()
    {
        return $this->belongsTo(Sekolah::class);
    }

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }
}