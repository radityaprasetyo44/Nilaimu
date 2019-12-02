<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;

use App\siswa;

use App\Nilaimu;

use App\RplAgama;

use Charts;

class NilaimuController extends Controller
{
    protected $nama;

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
                return redirect('api/v1/teacher/XIIRPL1');
            } else if (Auth::user()->status == 'student') {
                return redirect('api/v1/student/XIIRPL1');
            }
        } else {
            return redirect()->back()->with('alert','Username atau password salah!');
        }
    }

    public function teacher($nama)
    {
        $this->nama = $nama;
        $nilai = RplAgama::where('nama_kelas', $nama)->paginate(5);
        $k['1'] = RplAgama::where('nama_kelas', $nama)->avg('K1');
        $k['2'] = RplAgama::where('nama_kelas', $nama)->avg('K2');
        $k['3'] = RplAgama::where('nama_kelas', $nama)->avg('K3');
        $k['4'] = RplAgama::where('nama_kelas', $nama)->avg('K4');
        return view('teacher.dashboard', compact('nilai', 'k', 'nama'));
    }

    public function nilaiKelas()
    {
    	return view('layouts.NilaiKelas');
    }

    public function student($nama)
    {
        $nilai = RplAgama::where('nama_kelas', $nama)->paginate(5);
        $k['1'] = RplAgama::where('nama_kelas', $nama)->avg('K1');
        $k['2'] = RplAgama::where('nama_kelas', $nama)->avg('K2');
        $k['3'] = RplAgama::where('nama_kelas', $nama)->avg('K3');
        $k['4'] = RplAgama::where('nama_kelas', $nama)->avg('K4');
        return view('student.dashboard', compact('nilai', 'k', 'nama'));
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

    public function deleteData($nama)
    {
        $nilai = RplAgama::where('nama_kelas', $nama)->delete();
        return redirect()->back()->with('jsAlert', 'Data berhasil dihapus!');
    }
}
