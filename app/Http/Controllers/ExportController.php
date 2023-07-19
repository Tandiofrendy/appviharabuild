<?php

namespace App\Http\Controllers;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\Laporanusers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class ExportController extends Controller
{
     public function exportuserlap(){

            $data = DB::table('users')
            ->join('userinformations','users.email','=','userinformations.email')
            ->select('users.email','users.name','userinformations.nama_mandarin','userinformations.nama_indonesia','userinformations.alamat','userinformations.ttlahir','userinformations.nohp','userinformations.jenis_kelamin')
            ->get();
            return Excel::download(new Laporanusers($data), 'Laporanusers.xlsx');
     }
}
