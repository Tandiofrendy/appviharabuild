<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tempjadwalkegiatan extends Model
{
    use HasFactory;
    protected $table = 'temp_jadwalkegiatan';
    protected $fillable =[
        'kode_kegiatan',
        'kodekategori',
        'kode_vihara',
        'judul_kegiatan',
        'tanggal_kegiatan',
        'tglselesai_kegiatan',
        'mulai_kegiatan',
        'selesai_kegiatan',
        'lama_kegiatan',
        'nama_penceramah',
        'keterangan'
    ];

    public function Vihara(){
        return $this->belongsTo(Vihara::class,'kode_vihara','kode_vihara');
    }
}
