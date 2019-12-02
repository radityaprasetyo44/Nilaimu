<?php

namespace App\Exports;

use App\RplAgama;

use Maatwebsite\Excel\Concerns\FromCollection;

class Rpl1 implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return RplAgama::where('nama_kelas', 'XIIRPL1')->get();        
    }
}
