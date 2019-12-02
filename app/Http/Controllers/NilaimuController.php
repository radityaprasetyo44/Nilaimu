<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;

use App\siswa;

use App\Nilaimu;

use App\UserNilaimu;

use App\RplAgama;

use App\RplIndonesia;

use App\RplMatematika;

use App\RplInggris;

use App\RplProduktif;

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

    public function myScore($pelajaran)
    {
        if($pelajaran == 'agama'){
            $k['1'] = RplAgama::avg('K1');
            $k['2'] = RplAgama::avg('K2');
            $k['3'] = RplAgama::avg('K3');
            $k['4'] = RplAgama::avg('K4');
            return view('my.dashboard', compact('k'));
        } else if($pelajaran == 'matematika'){
            $k['1'] = RplMatematika::avg('K1');
            $k['2'] = RplMatematika::avg('K2');
            $k['3'] = RplMatematika::avg('K3');
            $k['4'] = RplMatematika::avg('K4');
            return view('my.dashboard', compact('k'));
        } else if($pelajaran == 'indonesia'){
            $k['1'] = RplIndonesia::avg('K1');
            $k['2'] = RplIndonesia::avg('K2');
            $k['3'] = RplIndonesia::avg('K3');
            $k['4'] = RplIndonesia::avg('K4');
            return view('my.dashboard', compact('k'));
        } else if($pelajaran == 'inggris'){
            $k['1'] = RplInggris::avg('K1');
            $k['2'] = RplInggris::avg('K2');
            $k['3'] = RplInggris::avg('K3');
            $k['4'] = RplInggris::avg('K4');
            return view('my.dashboard', compact('k'));
        } else {
            $k['1'] = RplProduktif::avg('K1');
            $k['2'] = RplProduktif::avg('K2');
            $k['3'] = RplProduktif::avg('K3');
            $k['4'] = RplProduktif::avg('K4');
            return view('my.dashboard', compact('k'));
        }
        
    }

    public function deleteData($nama)
    {
        $nilai = RplAgama::where('nama_kelas', $nama)->delete();
        return redirect()->back()->with('jsAlert', 'Data berhasil dihapus!');
    }

    public function signUp()
    {
        return view('layouts.signup');
    }

    public function addUser(Request $request)
    {
        // dd($request);
        $this->validate($request,[
            'nama' => 'required',
    		'status' => 'required',       
            'username' => 'required',
    		'password' => 'required'            
    	]);
 
        UserNilaimu::create([
            'nama' => $request->nama,
    		'status' => $request->status,            
    		'username' => $request->username,
    		'password' => bcrypt($request->password)
    	]);
 
    	return redirect('/api/v1/auth/login');
    }
}
