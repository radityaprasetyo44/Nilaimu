<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\siswa;

use App\Nilaimu;

use Charts;

class NilaimuController extends Controller
{

    public function login()
    {
        return view('layouts.login');
    }

    public function index()
    {
        $nilai = Nilaimu::paginate(5);
        $k1 = Nilaimu::avg('K1');
        $k2 = Nilaimu::avg('K2');
        $k3 = Nilaimu::avg('K3');
        $k4 = Nilaimu::avg('K4');
        return view('dashboards.dashboard', compact('nilai', 'k1', 'k2', 'k3', 'k4'));
    }

    public function nilaiKelas()
    {
    	return view('layouts.NilaiKelas');
    }
}
