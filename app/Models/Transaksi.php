<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    public $incrementing = false;
    // Nama tabel yang sesuai di database
    protected $table = 'transaksis';
    //Isi kolom dr table
    protected $fillable = [
        'id',
        'name',
        'noId',
        'telp',
        'id_wisata',
        'tgl_kunjungan',
        'jumlah_dewasa',
        'jumlah_anak',
    ];

    public function wisata()
    {
        # code...
        return $this->belongsTo(Wisata::class, 'id_wisata');
    }
}