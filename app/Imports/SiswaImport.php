<?php

namespace App\Imports;

use App\siswa;

use App\RplAgama;

use Maatwebsite\Excel\Concerns\ToModel;

class SiswaImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new RplAgama([
            'nama' => $row[1],
            'nis' => $row[2],
            'nama_kelas' => $row[3],
            'K1' => $row[4],
            'K2' => $row[5],
            'K3' => $row[6],
            'K4' => $row[7]
        ]);
    }
}
