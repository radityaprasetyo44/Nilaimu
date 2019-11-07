<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\siswa;

use Charts;

class NilaimuController extends Controller
{

    public function login()
    {
        return view('layouts.login');
    }

    public function index()
    {
        $chart = Charts::create('line', 'highcharts')
					    ->title('My nice chart')
					    ->elementLabel('My nice label')
					    ->labels(['First', 'Second', 'Third'])
					    ->values([5,10,20])
					    ->dimensions(1000,500)
                        ->responsive(false);
                        
        $siswa = siswa::paginate(5);
        return view('layouts.dashboard', ['siswa'=>$siswa], compact('chart'));
    }

    public function nilaiKelas()
    {
    	return view('layouts.NilaiKelas');
    }
}
