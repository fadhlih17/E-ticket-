<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wisata extends Model
{
    use HasFactory;
    public $incrementing = false;
    // Nama tabel yang sesuai di database
    protected $table = 'wisatas';
    //Isi kolom dr table
    protected $fillable = [
        'id',
        'name',
        'location',
        'price',
        'file'
    ];
}