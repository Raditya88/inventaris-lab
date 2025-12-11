<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;

    protected $table = 'peminjaman';

    protected $fillable = [
        'nama_peminjam',
        'identitas',
        'kontak',
        'inventaris_id',
        'tanggal_pinjam',
        'tanggal_kembali',
        'status',
    ];

    public function inventaris()
    {
        return $this->belongsTo(Inventaris::class);
    }
}
