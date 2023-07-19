<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategorikegiatan extends Model
{
    use HasFactory;

    protected $table = 'kategorikegiatans';
    protected $fillable =[
        'kodekategori',
        'namakategori',
        'keterangan'
    ];

    protected $hidden =[];
}
