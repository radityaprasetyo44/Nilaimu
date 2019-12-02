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

    public function collection($nama)
    {
        return RplAgama::where('nama_kelas', $nama)->get();
    }

    public function XIIRPL1()
    {
        return RplAgama::where('nama_kelas', 'XIIRPL1')->get();
    }

    public function XIIRPL2()
    {
        return RplAgama::where('nama_kelas', 'XIIRPL2')->get();
    }

    public function XIIRPL3()
    {
        return RplAgama::where('nama_kelas', 'XIIRPL3')->get();
    }

    public function XIIRPL4()
    {
        return RplAgama::where('nama_kelas', 'XIIRPL4')->get();
    }

    public function XIIRPL5()
    {
        return RplAgama::where('nama_kelas', 'XIIRPL5')->get();
    }

    public function XIIRPL6()
    {
        return RplAgama::where('nama_kelas', 'XIIRPL6')->get();
    }
}
