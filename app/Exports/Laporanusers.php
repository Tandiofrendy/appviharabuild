<?php

namespace App\Exports;


use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class Laporanusers implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */

    protected $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function collection()
    {
        return $this->data;
    }
    public function headings(): array
    {
        return [
            'Email', 
            'Username',
            'Nama Mandarin',
            'Nama Indonesia',
            'Tahun & Tanggal Lahir',
            'Nomor Hp',
            'Jenis Kelamin',
            'Alamat'
        ];
    }
}
