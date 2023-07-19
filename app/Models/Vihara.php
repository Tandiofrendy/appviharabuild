<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vihara extends Model
{
    use HasFactory;
    protected $table = 'vihara';
    protected $fillable =[
        'kode_vihara',
        'nama_vihara',
        'alamat'
    ];

    protected $hidden =[];

    public function postJadwal(){
        return $this->hasMany(Post_jadwalkegiatan::class, 'kode_vihara', 'kode_vihara');
    }
    public function pendiksaan(){
        return $this->hasMany(Bookingdiksa::class,'kode_vihara','kode_vihara');
    }
    public function tempjadwal(){
        return $this->hasMany(tempjadwalkegiatan::class,'kode_vihara','kode_vihara');
    }
}
