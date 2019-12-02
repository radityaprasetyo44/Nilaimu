<?php

namespace App\Exports;

use App\Nilaimu;

use App\RplAgama;

use Maatwebsite\Excel\Concerns\FromCollection;

use Illuminate\Contracts\collection\View;

class SiswaExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function collection()
    {
        dd('1');
        return RplAgama::where('nama_kelas', 'XIIRPL2')->get();
    }

    public function XIIRPL1()
    {
        dd('1');
        return RplAgama::where('nama_kelas', 'XIIRPL2')->get();
    }

    public function XIIRPL2()
    {
        return RplAgama::where('nama_kelas', 'XIIRPL2');
    }

    public function XIIRPL3()
    {
        return RplAgama::where('nama_kelas', 'XIIRPL3');
    }

    public function XIIRPL4()
    {
        return RplAgama::where('nama_kelas', 'XIIRPL4');
    }

    public function XIIRPL5()
    {
        return RplAgama::where('nama_kelas', 'XIIRPL5');
    }

    public function XIIRPL6()
    {
        return RplAgama::where('nama_kelas', 'XIIRPL6');
    }
}
