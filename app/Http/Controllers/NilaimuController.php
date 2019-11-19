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

    public function checkLogin(Request $request)
    {
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            if (Auth::user()->status == 'teacher') {
                return redirect('api/v1/teacher');
            } else if (Auth::user()->status == 'student') {
                return redirect('api/v1/student');
            }
        } else {
            return redirect()->back()->with('alert','Username atau password salah!');
        }
    }

    public function teacher()
    {
        $nilai = Nilaimu::paginate(5);
        $k['1'] = Nilaimu::avg('K1');
        $k['2'] = Nilaimu::avg('K2');
        $k['3'] = Nilaimu::avg('K3');
        $k['4'] = Nilaimu::avg('K4');
        return view('teacher.dashboard', compact('nilai', 'k'));
    }

    public function nilaiKelas()
    {
    	return view('layouts.NilaiKelas');
    }

    public function student()
    {
        $nilai = Nilaimu::paginate(5);
        $k['1'] = Nilaimu::avg('K1');
        $k['2'] = Nilaimu::avg('K2');
        $k['3'] = Nilaimu::avg('K3');
        $k['4'] = Nilaimu::avg('K4');
        return view('student.dashboard', compact('nilai', 'k'));
    }

    public function myScore()
    {
        $nilai = Nilaimu::paginate(5);
        $k['1'] = Nilaimu::avg('K1');
        $k['2'] = Nilaimu::avg('K2');
        $k['3'] = Nilaimu::avg('K3');
        $k['4'] = Nilaimu::avg('K4');
        return view('my.dashboard', compact('nilai', 'k'));
    }
}
