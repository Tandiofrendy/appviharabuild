<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bookingdiksa extends Model
{
    use HasFactory;
    protected $table = 'pendiksaan';
    protected $guarded = [];

    public function reservasidiksa(){
        return $this->hasMany(reservasidiksa::class, 'kode_diksa', 'kode_diksa');
    }
    public function Vihara(){
        return $this->belongsTo(Vihara::class,'kode_vihara','kode_vihara');
    }
}
