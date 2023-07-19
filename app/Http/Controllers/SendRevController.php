<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SendRevController extends Controller
{
    public function index($data)
    {
        
        return view('pages/layouts-buktidaftar-diksa',compact('data'));
    }
    public function layoustspdfdiksa($data)
    {
        return view('pages/layouts-laporan-diksa',compact('data'));
    }
    public function layoutskegiatan($data)
    {
        return view('pages/layouts-laporankegiatan',compact('data'));
    }
}
