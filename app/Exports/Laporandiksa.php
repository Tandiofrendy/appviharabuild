<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class Laporandiksa implements FromCollection,WithHeadings
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
            'Kode diksa', 
            'Nama Pendaftar',
            'Total Orang Diksa',
            'No.Hp Pendaftar',
            'Status',
            'Tanggal Diksa' 
        ];
    }
}
