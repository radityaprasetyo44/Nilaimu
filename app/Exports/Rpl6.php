<?php

namespace App\Exports;

use App\RplAgama;

use Maatwebsite\Excel\Concerns\FromCollection;

class Rpl6 implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return RplAgama::where('nama_kelas', 'XIIRPL6')->get();                
    }
}
