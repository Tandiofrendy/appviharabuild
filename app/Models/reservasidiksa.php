<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reservasidiksa extends Model
{
    use HasFactory;
    protected $table = 'detail_pendiksaan';
    protected $guarded = ['id'];
}
