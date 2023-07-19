<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jadwalkegiatan extends Model
{
    use HasFactory;
    protected $table = 'jadwalkegiatan';
    protected $fillable =[
        'kode_kegiatan',
        'email',
        'status_jadwal',
    ];
}
