<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roleadmin extends Model
{
    use HasFactory;

    protected $table = 'roleadmin';
    protected $fillable =[
        'email',
        'kode_divisi',
        'role',
        'status'
    ];

    protected $hidden =[
        'email'
    ];
    public function User(){
        return $this->hasMany(User::class, 'email', 'email');
    }
    public function Divisis(){
        return $this->belongsTo(Divisi::class,'kode_divisi','kode_divisi');
    }
}
