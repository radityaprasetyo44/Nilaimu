<?php

namespace App\Exports;

use App\RplAgama;

use Maatwebsite\Excel\Concerns\FromCollection;

class Rpl4 implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return RplAgama::where('nama_kelas', 'XIIRPL4')->get();        
    }
}
