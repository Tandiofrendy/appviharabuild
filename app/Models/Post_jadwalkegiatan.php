<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post_jadwalkegiatan extends Model
{
    use HasFactory;
    protected $table = 'post_jadwalkegiatan';
    protected $fillable =[
        'kode_posting',
        'kodekategori',
        'kode_vihara',
        'email',
        'judul_kegiatan',
        'tanggal_kegiatan',
        'tglselesai_kegiatan',
        'mulai_kegiatan',
        'selesai_kegiatan',
        'lama_kegiatan',
        'nama_penceramah',
        'keterangan',
        'status_posting',
        'kodeqr'
    ];

    protected $hidden =[];

    public function Vihara(){
        return $this->belongsTo(Vihara::class,'kode_vihara','kode_vihara');
    }
}
