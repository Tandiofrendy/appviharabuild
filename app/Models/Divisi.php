<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Divisi extends Model
{
    use HasFactory;
    protected $table = 'divisi';
    protected $fillable =[
        'kode_divisi',
        'nama_divisi'
    ];

    protected $hidden =[];

    public  function roleadmins(){
        return $this->hasMany(Roleadmin::class,'kode_divisi','kode_divisi');
    }
    
}
