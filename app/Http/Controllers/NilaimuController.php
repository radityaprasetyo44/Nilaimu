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
                return redirect('api/v1/student/agama/XIIRPL1');
            }
        } else {
            return redirect()->back()->with('alert','Username atau password salah!');
        }
    }

    public function teacher($nama)
    {
        $nilai = RplAgama::where('nama_kelas', $nama)->paginate(5);
        $k['1'] = RplAgama::where('nama_kelas', $nama)->avg('K1');
        $k['2'] = RplAgama::where('nama_kelas', $nama)->avg('K2');
        $k['3'] = RplAgama::where('nama_kelas', $nama)->avg('K3');
        $k['4'] = RplAgama::where('nama_kelas', $nama)->avg('K4');

        $k['r11'] = RplAgama::where('nama_kelas', 'XIIRPL1')->avg('K1');
        $k['r12'] = RplAgama::where('nama_kelas', 'XIIRPL1')->avg('K2');
        $k['r13'] = RplAgama::where('nama_kelas', 'XIIRPL1')->avg('K3');
        $k['r14'] = RplAgama::where('nama_kelas', 'XIIRPL1')->avg('K4');
        $k['r15'] = ($k['r11'] + $k['r12'] + $k['r13'] + $k['r14']) / 4; 
        $jumlah['k1'] = count(RplAgama::where('nama_kelas', $nama)->where('K1', '<', 75)->get());
        $jumlah['k2'] = count(RplAgama::where('nama_kelas', $nama)->where('K2', '<', 75)->get());
        $jumlah['k3'] = count(RplAgama::where('nama_kelas', $nama)->where('K3', '<', 75)->get());
        $jumlah['k4'] = count(RplAgama::where('nama_kelas', $nama)->where('K4', '<', 75)->get());
        $jumlah['k5'] = $jumlah['k1'] + $jumlah['k2'] + $jumlah['k3'] + $jumlah['k4'];

        $jumlah['k21'] = count(RplAgama::where('nama_kelas', $nama)->where('K1', '>=', 75)->get());
        $jumlah['k22'] = count(RplAgama::where('nama_kelas', $nama)->where('K2', '>=', 75)->get());
        $jumlah['k23'] = count(RplAgama::where('nama_kelas', $nama)->where('K3', '>=', 75)->get());
        $jumlah['k24'] = count(RplAgama::where('nama_kelas', $nama)->where('K4', '>=', 75)->get());
        $jumlah['k25'] = $jumlah['k21'] + $jumlah['k22'] + $jumlah['k23'] + $jumlah['k24'];

        $k['r21'] = RplAgama::where('nama_kelas', 'XIIRPL2')->avg('K1');
        $k['r22'] = RplAgama::where('nama_kelas', 'XIIRPL2')->avg('K2');
        $k['r23'] = RplAgama::where('nama_kelas', 'XIIRPL2')->avg('K3');
        $k['r24'] = RplAgama::where('nama_kelas', 'XIIRPL2')->avg('K4');
        $k['r25'] = ($k['r21'] + $k['r22'] + $k['r23'] + $k['r24']) / 4;
        
        $k['r31'] = RplAgama::where('nama_kelas', 'XIIRPL3')->avg('K1');
        $k['r32'] = RplAgama::where('nama_kelas', 'XIIRPL3')->avg('K2');
        $k['r33'] = RplAgama::where('nama_kelas', 'XIIRPL3')->avg('K3');
        $k['r34'] = RplAgama::where('nama_kelas', 'XIIRPL3')->avg('K4');
        $k['r35'] = ($k['r31'] + $k['r32'] + $k['r33'] + $k['r34']) / 4;

        $k['r41'] = RplAgama::where('nama_kelas', 'XIIRPL4')->avg('K1');
        $k['r42'] = RplAgama::where('nama_kelas', 'XIIRPL4')->avg('K2');
        $k['r43'] = RplAgama::where('nama_kelas', 'XIIRPL4')->avg('K3');
        $k['r44'] = RplAgama::where('nama_kelas', 'XIIRPL4')->avg('K4');
        $k['r45'] = ($k['r41'] + $k['r42'] + $k['r43'] + $k['r44']) / 4;

        $k['r51'] = RplAgama::where('nama_kelas', 'XIIRPL5')->avg('K1');
        $k['r52'] = RplAgama::where('nama_kelas', 'XIIRPL5')->avg('K2');
        $k['r53'] = RplAgama::where('nama_kelas', 'XIIRPL5')->avg('K3');
        $k['r54'] = RplAgama::where('nama_kelas', 'XIIRPL5')->avg('K4');
        $k['r55'] = ($k['r51'] + $k['r52'] + $k['r53'] + $k['r54']) / 4;

        $k['r61'] = RplAgama::where('nama_kelas', 'XIIRPL6')->avg('K1');
        $k['r62'] = RplAgama::where('nama_kelas', 'XIIRPL6')->avg('K2');
        $k['r63'] = RplAgama::where('nama_kelas', 'XIIRPL6')->avg('K3');
        $k['r64'] = RplAgama::where('nama_kelas', 'XIIRPL6')->avg('K4');
        $k['r65'] = ($k['r61'] + $k['r62'] + $k['r63'] + $k['r64']) / 4;

        $total['k1'] = RplAgama::all()->avg('K1');
        $total['k2'] = RplAgama::all()->avg('K2');
        $total['k3'] = RplAgama::all()->avg('K3');
        $total['k4'] = RplAgama::all()->avg('K4');
        $total['k11'] = count(RplAgama::all()->avg('K1'));
        $total['k21'] = count(RplAgama::all()->avg('K2'));
        $total['k31'] = count(RplAgama::all()->avg('K3'));
        $total['k41'] = count(RplAgama::all()->avg('K4'));
        $total['k5'] = $total['k1'] + $total['k2'] + $total['k3'] + $total['k4'];

        $rata['k1'] = $total['k1'];
        $rata['k2'] = $total['k2'];
        $rata['k3'] = $total['k3'];
        $rata['k4'] = $total['k4'];

        $k['5'] = $k['1'] + $k['2'] + $k['3'] + $k['4'];
        
        if($k['5'] == 0){
            $k['111'] = 0;
            $k['112'] = 0;
            $k['113'] = 0;
            $k['114'] = 0;

            return view('teacher.dashboard', compact('nilai', 'k', 'nama', 'rata', 'jumlah'));
        }

        $k['111'] = ($k['1'] / $k['5']) * 100;
        $k['112'] = ($k['2'] / $k['5']) * 100;
        $k['113'] = ($k['3'] / $k['5']) * 100;
        $k['114'] = ($k['4'] / $k['5']) * 100;

        return view('teacher.dashboard', compact('nilai', 'k', 'nama', 'rata', 'jumlah'));
    }

    public function nilaiKelas()
    {
    	return view('layouts.NilaiKelas');
    }

    public function student($pelajaran, $nama)
    {
        // dd($pelajaran, $nama);
        if($pelajaran == 'agama'){
            $nilai = RplAgama::where('nama_kelas', $nama)->paginate(5);
            $k['1'] = RplAgama::where('nama_kelas', $nama)->avg('K1');
            $k['2'] = RplAgama::where('nama_kelas', $nama)->avg('K2');
            $k['3'] = RplAgama::where('nama_kelas', $nama)->avg('K3');
            $k['4'] = RplAgama::where('nama_kelas', $nama)->avg('K4');

        $k['r11'] = RplAgama::where('nama_kelas', 'XIIRPL1')->avg('K1');
        $k['r12'] = RplAgama::where('nama_kelas', 'XIIRPL1')->avg('K2');
        $k['r13'] = RplAgama::where('nama_kelas', 'XIIRPL1')->avg('K3');
        $k['r14'] = RplAgama::where('nama_kelas', 'XIIRPL1')->avg('K4');
        $k['r15'] = ($k['r11'] + $k['r12'] + $k['r13'] + $k['r14']) / 4; 

        $k['r21'] = RplAgama::where('nama_kelas', 'XIIRPL2')->avg('K1');
        $k['r22'] = RplAgama::where('nama_kelas', 'XIIRPL2')->avg('K2');
        $k['r23'] = RplAgama::where('nama_kelas', 'XIIRPL2')->avg('K3');
        $k['r24'] = RplAgama::where('nama_kelas', 'XIIRPL2')->avg('K4');
        $k['r25'] = ($k['r21'] + $k['r22'] + $k['r23'] + $k['r24']) / 4;
        
        $k['r31'] = RplAgama::where('nama_kelas', 'XIIRPL3')->avg('K1');
        $k['r32'] = RplAgama::where('nama_kelas', 'XIIRPL3')->avg('K2');
        $k['r33'] = RplAgama::where('nama_kelas', 'XIIRPL3')->avg('K3');
        $k['r34'] = RplAgama::where('nama_kelas', 'XIIRPL3')->avg('K4');
        $k['r35'] = ($k['r31'] + $k['r32'] + $k['r33'] + $k['r34']) / 4;

        $k['r41'] = RplAgama::where('nama_kelas', 'XIIRPL4')->avg('K1');
        $k['r42'] = RplAgama::where('nama_kelas', 'XIIRPL4')->avg('K2');
        $k['r43'] = RplAgama::where('nama_kelas', 'XIIRPL4')->avg('K3');
        $k['r44'] = RplAgama::where('nama_kelas', 'XIIRPL4')->avg('K4');
        $k['r45'] = ($k['r41'] + $k['r42'] + $k['r43'] + $k['r44']) / 4;

        $k['r51'] = RplAgama::where('nama_kelas', 'XIIRPL5')->avg('K1');
        $k['r52'] = RplAgama::where('nama_kelas', 'XIIRPL5')->avg('K2');
        $k['r53'] = RplAgama::where('nama_kelas', 'XIIRPL5')->avg('K3');
        $k['r54'] = RplAgama::where('nama_kelas', 'XIIRPL5')->avg('K4');
        $k['r55'] = ($k['r51'] + $k['r52'] + $k['r53'] + $k['r54']) / 4;

        $k['r61'] = RplAgama::where('nama_kelas', 'XIIRPL6')->avg('K1');
        $k['r62'] = RplAgama::where('nama_kelas', 'XIIRPL6')->avg('K2');
        $k['r63'] = RplAgama::where('nama_kelas', 'XIIRPL6')->avg('K3');
        $k['r64'] = RplAgama::where('nama_kelas', 'XIIRPL6')->avg('K4');
        $k['r65'] = ($k['r61'] + $k['r62'] + $k['r63'] + $k['r64']) / 4;

        $total['k1'] = RplAgama::all()->avg('K1');
        $total['k2'] = RplAgama::all()->avg('K2');
        $total['k3'] = RplAgama::all()->avg('K3');
        $total['k4'] = RplAgama::all()->avg('K4');
        $total['k5'] = $total['k1'] + $total['k2'] + $total['k3'] + $total['k4'];

        
        $jumlah['k1'] = count(RplAgama::where('nama_kelas', $nama)->where('K1', '<', 75)->get());
        $jumlah['k2'] = count(RplAgama::where('nama_kelas', $nama)->where('K2', '<', 75)->get());
        $jumlah['k3'] = count(RplAgama::where('nama_kelas', $nama)->where('K3', '<', 75)->get());
        $jumlah['k4'] = count(RplAgama::where('nama_kelas', $nama)->where('K4', '<', 75)->get());
        $jumlah['k5'] = $jumlah['k1'] + $jumlah['k2'] + $jumlah['k3'] + $jumlah['k4'];

        $jumlah['k21'] = count(RplAgama::where('nama_kelas', $nama)->where('K1', '>=', 75)->get());
        $jumlah['k22'] = count(RplAgama::where('nama_kelas', $nama)->where('K2', '>=', 75)->get());
        $jumlah['k23'] = count(RplAgama::where('nama_kelas', $nama)->where('K3', '>=', 75)->get());
        $jumlah['k24'] = count(RplAgama::where('nama_kelas', $nama)->where('K4', '>=', 75)->get());
        $jumlah['k25'] = $jumlah['k21'] + $jumlah['k22'] + $jumlah['k23'] + $jumlah['k24'];

        if($total['k5'] == 0){
            $rata['k1'] = 0;
            $rata['k2'] = 0;
            $rata['k3'] = 0;
            $rata['k4'] = 0;

            return view('student.dashboard', compact('nilai', 'k', 'nama', 'rata', 'jumlah'));
        }

        $rata['k1'] = $total['k1'];
        $rata['k2'] = $total['k2'];
        $rata['k3'] = $total['k3'];
        $rata['k4'] = $total['k4'];

            return view('student.dashboard', compact('nilai', 'k', 'nama', 'rata', 'jumlah'));
        } else if($pelajaran == 'matematika'){
            $nilai = RplMatematika::where('nama_kelas', $nama)->paginate(5);
            $k['1'] = RplMatematika::where('nama_kelas', $nama)->avg('K1');
            $k['2'] = RplMatematika::where('nama_kelas', $nama)->avg('K2');
            $k['3'] = RplMatematika::where('nama_kelas', $nama)->avg('K3');
            $k['4'] = RplMatematika::where('nama_kelas', $nama)->avg('K4');

        $k['r11'] = RplMatematika::where('nama_kelas', 'XIIRPL1')->avg('K1');
        $k['r12'] = RplMatematika::where('nama_kelas', 'XIIRPL1')->avg('K2');
        $k['r13'] = RplMatematika::where('nama_kelas', 'XIIRPL1')->avg('K3');
        $k['r14'] = RplMatematika::where('nama_kelas', 'XIIRPL1')->avg('K4');
        $k['r15'] = ($k['r11'] + $k['r12'] + $k['r13'] + $k['r14']) / 4; 

        $k['r21'] = RplMatematika::where('nama_kelas', 'XIIRPL2')->avg('K1');
        $k['r22'] = RplMatematika::where('nama_kelas', 'XIIRPL2')->avg('K2');
        $k['r23'] = RplMatematika::where('nama_kelas', 'XIIRPL2')->avg('K3');
        $k['r24'] = RplMatematika::where('nama_kelas', 'XIIRPL2')->avg('K4');
        $k['r25'] = ($k['r21'] + $k['r22'] + $k['r23'] + $k['r24']) / 4;
        
        $k['r31'] = RplMatematika::where('nama_kelas', 'XIIRPL3')->avg('K1');
        $k['r32'] = RplMatematika::where('nama_kelas', 'XIIRPL3')->avg('K2');
        $k['r33'] = RplMatematika::where('nama_kelas', 'XIIRPL3')->avg('K3');
        $k['r34'] = RplMatematika::where('nama_kelas', 'XIIRPL3')->avg('K4');
        $k['r35'] = ($k['r31'] + $k['r32'] + $k['r33'] + $k['r34']) / 4;

        $k['r41'] = RplMatematika::where('nama_kelas', 'XIIRPL4')->avg('K1');
        $k['r42'] = RplMatematika::where('nama_kelas', 'XIIRPL4')->avg('K2');
        $k['r43'] = RplMatematika::where('nama_kelas', 'XIIRPL4')->avg('K3');
        $k['r44'] = RplMatematika::where('nama_kelas', 'XIIRPL4')->avg('K4');
        $k['r45'] = ($k['r41'] + $k['r42'] + $k['r43'] + $k['r44']) / 4;

        $k['r51'] = RplMatematika::where('nama_kelas', 'XIIRPL5')->avg('K1');
        $k['r52'] = RplMatematika::where('nama_kelas', 'XIIRPL5')->avg('K2');
        $k['r53'] = RplMatematika::where('nama_kelas', 'XIIRPL5')->avg('K3');
        $k['r54'] = RplMatematika::where('nama_kelas', 'XIIRPL5')->avg('K4');
        $k['r55'] = ($k['r51'] + $k['r52'] + $k['r53'] + $k['r54']) / 4;

        $k['r61'] = RplMatematika::where('nama_kelas', 'XIIRPL6')->avg('K1');
        $k['r62'] = RplMatematika::where('nama_kelas', 'XIIRPL6')->avg('K2');
        $k['r63'] = RplMatematika::where('nama_kelas', 'XIIRPL6')->avg('K3');
        $k['r64'] = RplMatematika::where('nama_kelas', 'XIIRPL6')->avg('K4');
        $k['r65'] = ($k['r61'] + $k['r62'] + $k['r63'] + $k['r64']) / 4;

        $total['k1'] = RplMatematika::all()->avg('K1');
        if($total['k1'] == null){
            $total['k1'] = 0;
        }

        $total['k2'] = RplMatematika::all()->avg('K2');
        $total['k3'] = RplMatematika::all()->avg('K3');
        $total['k4'] = RplMatematika::all()->avg('K4');
        $total['k5'] = $total['k1'] + $total['k2'] + $total['k3'] + $total['k4'];

        
        $jumlah['k1'] = count(RplMatematika::where('nama_kelas', $nama)->where('K1', '<', 75)->get());
        $jumlah['k2'] = count(RplMatematika::where('nama_kelas', $nama)->where('K2', '<', 75)->get());
        $jumlah['k3'] = count(RplMatematika::where('nama_kelas', $nama)->where('K3', '<', 75)->get());
        $jumlah['k4'] = count(RplMatematika::where('nama_kelas', $nama)->where('K4', '<', 75)->get());
        $jumlah['k5'] = $jumlah['k1'] + $jumlah['k2'] + $jumlah['k3'] + $jumlah['k4'];

        $jumlah['k21'] = count(RplMatematika::where('nama_kelas', $nama)->where('K1', '>=', 75)->get());
        $jumlah['k22'] = count(RplMatematika::where('nama_kelas', $nama)->where('K2', '>=', 75)->get());
        $jumlah['k23'] = count(RplMatematika::where('nama_kelas', $nama)->where('K3', '>=', 75)->get());
        $jumlah['k24'] = count(RplMatematika::where('nama_kelas', $nama)->where('K4', '>=', 75)->get());
        $jumlah['k25'] = $jumlah['k21'] + $jumlah['k22'] + $jumlah['k23'] + $jumlah['k24'];

        if($total['k5'] == 0){
            $rata['k1'] = 0;
            $rata['k2'] = 0;
            $rata['k3'] = 0;
            $rata['k4'] = 0;

            return view('student.dashboard', compact('nilai', 'k', 'nama', 'rata', 'jumlah'));
        }
        $rata['k1'] = $total['k1'];
        $rata['k2'] = $total['k2'];
        $rata['k3'] = $total['k3'];
        $rata['k4'] = $total['k4'];
            return view('student.dashboard', compact('nilai', 'k', 'nama', 'rata', 'jumlah'));
        } else if($pelajaran == 'indonesia'){
        $nilai = RplIndonesia::where('nama_kelas', $nama)->paginate(5);
        $k['1'] = RplIndonesia::where('nama_kelas', $nama)->avg('K1');
        $k['2'] = RplIndonesia::where('nama_kelas', $nama)->avg('K2');
        $k['3'] = RplIndonesia::where('nama_kelas', $nama)->avg('K3');
        $k['4'] = RplIndonesia::where('nama_kelas', $nama)->avg('K4');

        $k['r11'] = RplIndonesia::where('nama_kelas', 'XIIRPL1')->avg('K1');
        $k['r12'] = RplIndonesia::where('nama_kelas', 'XIIRPL1')->avg('K2');
        $k['r13'] = RplIndonesia::where('nama_kelas', 'XIIRPL1')->avg('K3');
        $k['r14'] = RplIndonesia::where('nama_kelas', 'XIIRPL1')->avg('K4');
        $k['r15'] = ($k['r11'] + $k['r12'] + $k['r13'] + $k['r14']) / 4; 

        $k['r21'] = RplIndonesia::where('nama_kelas', 'XIIRPL2')->avg('K1');
        $k['r22'] = RplIndonesia::where('nama_kelas', 'XIIRPL2')->avg('K2');
        $k['r23'] = RplIndonesia::where('nama_kelas', 'XIIRPL2')->avg('K3');
        $k['r24'] = RplIndonesia::where('nama_kelas', 'XIIRPL2')->avg('K4');
        $k['r25'] = ($k['r21'] + $k['r22'] + $k['r23'] + $k['r24']) / 4;
        
        $k['r31'] = RplIndonesia::where('nama_kelas', 'XIIRPL3')->avg('K1');
        $k['r32'] = RplIndonesia::where('nama_kelas', 'XIIRPL3')->avg('K2');
        $k['r33'] = RplIndonesia::where('nama_kelas', 'XIIRPL3')->avg('K3');
        $k['r34'] = RplIndonesia::where('nama_kelas', 'XIIRPL3')->avg('K4');
        $k['r35'] = ($k['r31'] + $k['r32'] + $k['r33'] + $k['r34']) / 4;

        $k['r41'] = RplIndonesia::where('nama_kelas', 'XIIRPL4')->avg('K1');
        $k['r42'] = RplIndonesia::where('nama_kelas', 'XIIRPL4')->avg('K2');
        $k['r43'] = RplIndonesia::where('nama_kelas', 'XIIRPL4')->avg('K3');
        $k['r44'] = RplIndonesia::where('nama_kelas', 'XIIRPL4')->avg('K4');
        $k['r45'] = ($k['r41'] + $k['r42'] + $k['r43'] + $k['r44']) / 4;

        $k['r51'] = RplIndonesia::where('nama_kelas', 'XIIRPL5')->avg('K1');
        $k['r52'] = RplIndonesia::where('nama_kelas', 'XIIRPL5')->avg('K2');
        $k['r53'] = RplIndonesia::where('nama_kelas', 'XIIRPL5')->avg('K3');
        $k['r54'] = RplIndonesia::where('nama_kelas', 'XIIRPL5')->avg('K4');
        $k['r55'] = ($k['r51'] + $k['r52'] + $k['r53'] + $k['r54']) / 4;

        $k['r61'] = RplIndonesia::where('nama_kelas', 'XIIRPL6')->avg('K1');
        $k['r62'] = RplIndonesia::where('nama_kelas', 'XIIRPL6')->avg('K2');
        $k['r63'] = RplIndonesia::where('nama_kelas', 'XIIRPL6')->avg('K3');
        $k['r64'] = RplIndonesia::where('nama_kelas', 'XIIRPL6')->avg('K4');
        $k['r65'] = ($k['r61'] + $k['r62'] + $k['r63'] + $k['r64']) / 4;
        
        $total['k1'] = RplIndonesia::all()->avg('K1');
        $total['k2'] = RplIndonesia::all()->avg('K2');
        $total['k3'] = RplIndonesia::all()->avg('K3');
        $total['k4'] = RplIndonesia::all()->avg('K4');
        $total['k5'] = $total['k1'] + $total['k2'] + $total['k3'] + $total['k4'];

        
        $jumlah['k1'] = count(RplIndonesia::where('nama_kelas', $nama)->where('K1', '<', 75)->get());
        $jumlah['k2'] = count(RplIndonesia::where('nama_kelas', $nama)->where('K2', '<', 75)->get());
        $jumlah['k3'] = count(RplIndonesia::where('nama_kelas', $nama)->where('K3', '<', 75)->get());
        $jumlah['k4'] = count(RplIndonesia::where('nama_kelas', $nama)->where('K4', '<', 75)->get());
        $jumlah['k5'] = $jumlah['k1'] + $jumlah['k2'] + $jumlah['k3'] + $jumlah['k4'];

        $jumlah['k21'] = count(RplIndonesia::where('nama_kelas', $nama)->where('K1', '>=', 75)->get());
        $jumlah['k22'] = count(RplIndonesia::where('nama_kelas', $nama)->where('K2', '>=', 75)->get());
        $jumlah['k23'] = count(RplIndonesia::where('nama_kelas', $nama)->where('K3', '>=', 75)->get());
        $jumlah['k24'] = count(RplIndonesia::where('nama_kelas', $nama)->where('K4', '>=', 75)->get());
        $jumlah['k25'] = $jumlah['k21'] + $jumlah['k22'] + $jumlah['k23'] + $jumlah['k24'];

        if($total['k5'] == 0){
            $rata['k1'] = 0;
            $rata['k2'] = 0;
            $rata['k3'] = 0;
            $rata['k4'] = 0;

            return view('student.dashboard', compact('nilai', 'k', 'nama', 'rata', 'jumlah'));
        }

        $rata['k1'] = $total['k1'];
        $rata['k2'] = $total['k2'];
        $rata['k3'] = $total['k3'];
        $rata['k4'] = $total['k4'];
            return view('student.dashboard', compact('nilai', 'k', 'nama', 'rata', 'jumlah'));
        } else if($pelajaran == 'inggris'){
        $nilai = RplInggris::where('nama_kelas', $nama)->paginate(5);
        $k['1'] = RplInggris::where('nama_kelas', $nama)->avg('K1');
        $k['2'] = RplInggris::where('nama_kelas', $nama)->avg('K2');
        $k['3'] = RplInggris::where('nama_kelas', $nama)->avg('K3');
        $k['4'] = RplInggris::where('nama_kelas', $nama)->avg('K4');

        $k['r11'] = RplInggris::where('nama_kelas', 'XIIRPL1')->avg('K1');
        $k['r12'] = RplInggris::where('nama_kelas', 'XIIRPL1')->avg('K2');
        $k['r13'] = RplInggris::where('nama_kelas', 'XIIRPL1')->avg('K3');
        $k['r14'] = RplInggris::where('nama_kelas', 'XIIRPL1')->avg('K4');
        $k['r15'] = ($k['r11'] + $k['r12'] + $k['r13'] + $k['r14']) / 4; 

        $k['r21'] = RplInggris::where('nama_kelas', 'XIIRPL2')->avg('K1');
        $k['r22'] = RplInggris::where('nama_kelas', 'XIIRPL2')->avg('K2');
        $k['r23'] = RplInggris::where('nama_kelas', 'XIIRPL2')->avg('K3');
        $k['r24'] = RplInggris::where('nama_kelas', 'XIIRPL2')->avg('K4');
        $k['r25'] = ($k['r21'] + $k['r22'] + $k['r23'] + $k['r24']) / 4;
        
        $k['r31'] = RplInggris::where('nama_kelas', 'XIIRPL3')->avg('K1');
        $k['r32'] = RplInggris::where('nama_kelas', 'XIIRPL3')->avg('K2');
        $k['r33'] = RplInggris::where('nama_kelas', 'XIIRPL3')->avg('K3');
        $k['r34'] = RplInggris::where('nama_kelas', 'XIIRPL3')->avg('K4');
        $k['r35'] = ($k['r31'] + $k['r32'] + $k['r33'] + $k['r34']) / 4;

        $k['r41'] = RplInggris::where('nama_kelas', 'XIIRPL4')->avg('K1');
        $k['r42'] = RplInggris::where('nama_kelas', 'XIIRPL4')->avg('K2');
        $k['r43'] = RplInggris::where('nama_kelas', 'XIIRPL4')->avg('K3');
        $k['r44'] = RplInggris::where('nama_kelas', 'XIIRPL4')->avg('K4');
        $k['r45'] = ($k['r41'] + $k['r42'] + $k['r43'] + $k['r44']) / 4;

        $k['r51'] = RplInggris::where('nama_kelas', 'XIIRPL5')->avg('K1');
        $k['r52'] = RplInggris::where('nama_kelas', 'XIIRPL5')->avg('K2');
        $k['r53'] = RplInggris::where('nama_kelas', 'XIIRPL5')->avg('K3');
        $k['r54'] = RplInggris::where('nama_kelas', 'XIIRPL5')->avg('K4');
        $k['r55'] = ($k['r51'] + $k['r52'] + $k['r53'] + $k['r54']) / 4;

        $k['r61'] = RplInggris::where('nama_kelas', 'XIIRPL6')->avg('K1');
        $k['r62'] = RplInggris::where('nama_kelas', 'XIIRPL6')->avg('K2');
        $k['r63'] = RplInggris::where('nama_kelas', 'XIIRPL6')->avg('K3');
        $k['r64'] = RplInggris::where('nama_kelas', 'XIIRPL6')->avg('K4');
        $k['r65'] = ($k['r61'] + $k['r62'] + $k['r63'] + $k['r64']) / 4;

        $total['k1'] = RplInggris::all()->avg('K1');
        $total['k2'] = RplInggris::all()->avg('K2');
        $total['k3'] = RplInggris::all()->avg('K3');
        $total['k4'] = RplInggris::all()->avg('K4');
        $total['k5'] = $total['k1'] + $total['k2'] + $total['k3'] + $total['k4'];

        
        $jumlah['k1'] = count(RplInggris::where('nama_kelas', $nama)->where('K1', '<', 75)->get());
        $jumlah['k2'] = count(RplInggris::where('nama_kelas', $nama)->where('K2', '<', 75)->get());
        $jumlah['k3'] = count(RplInggris::where('nama_kelas', $nama)->where('K3', '<', 75)->get());
        $jumlah['k4'] = count(RplInggris::where('nama_kelas', $nama)->where('K4', '<', 75)->get());
        $jumlah['k5'] = $jumlah['k1'] + $jumlah['k2'] + $jumlah['k3'] + $jumlah['k4'];

        $jumlah['k21'] = count(RplInggris::where('nama_kelas', $nama)->where('K1', '>=', 75)->get());
        $jumlah['k22'] = count(RplInggris::where('nama_kelas', $nama)->where('K2', '>=', 75)->get());
        $jumlah['k23'] = count(RplInggris::where('nama_kelas', $nama)->where('K3', '>=', 75)->get());
        $jumlah['k24'] = count(RplInggris::where('nama_kelas', $nama)->where('K4', '>=', 75)->get());
        $jumlah['k25'] = $jumlah['k21'] + $jumlah['k22'] + $jumlah['k23'] + $jumlah['k24'];

        if($total['k5'] == 0){
            $rata['k1'] = 0;
            $rata['k2'] = 0;
            $rata['k3'] = 0;
            $rata['k4'] = 0;

            return view('student.dashboard', compact('nilai', 'k', 'nama', 'rata', 'jumlah'));
        }

        $rata['k1'] = $total['k1'];
        $rata['k2'] = $total['k2'];
        $rata['k3'] = $total['k3'];
        $rata['k4'] = $total['k4'];
            return view('student.dashboard', compact('nilai', 'k', 'nama', 'rata', 'jumlah'));
        } else {
            $nilai = RplProduktif::where('nama_kelas', $nama)->paginate(5);
            $k['1'] = RplProduktif::where('nama_kelas', $nama)->avg('K1');
            $k['2'] = RplProduktif::where('nama_kelas', $nama)->avg('K2');
            $k['3'] = RplProduktif::where('nama_kelas', $nama)->avg('K3');
            $k['4'] = RplProduktif::where('nama_kelas', $nama)->avg('K4');

            $k['r11'] = RplProduktif::where('nama_kelas', 'XIIRPL1')->avg('K1');
        $k['r12'] = RplProduktif::where('nama_kelas', 'XIIRPL1')->avg('K2');
        $k['r13'] = RplProduktif::where('nama_kelas', 'XIIRPL1')->avg('K3');
        $k['r14'] = RplProduktif::where('nama_kelas', 'XIIRPL1')->avg('K4');
        $k['r15'] = ($k['r11'] + $k['r12'] + $k['r13'] + $k['r14']) / 4; 

        $k['r21'] = RplProduktif::where('nama_kelas', 'XIIRPL2')->avg('K1');
        $k['r22'] = RplProduktif::where('nama_kelas', 'XIIRPL2')->avg('K2');
        $k['r23'] = RplProduktif::where('nama_kelas', 'XIIRPL2')->avg('K3');
        $k['r24'] = RplProduktif::where('nama_kelas', 'XIIRPL2')->avg('K4');
        $k['r25'] = ($k['r21'] + $k['r22'] + $k['r23'] + $k['r24']) / 4;
        
        $k['r31'] = RplProduktif::where('nama_kelas', 'XIIRPL3')->avg('K1');
        $k['r32'] = RplProduktif::where('nama_kelas', 'XIIRPL3')->avg('K2');
        $k['r33'] = RplProduktif::where('nama_kelas', 'XIIRPL3')->avg('K3');
        $k['r34'] = RplProduktif::where('nama_kelas', 'XIIRPL3')->avg('K4');
        $k['r35'] = ($k['r31'] + $k['r32'] + $k['r33'] + $k['r34']) / 4;

        $k['r41'] = RplProduktif::where('nama_kelas', 'XIIRPL4')->avg('K1');
        $k['r42'] = RplProduktif::where('nama_kelas', 'XIIRPL4')->avg('K2');
        $k['r43'] = RplProduktif::where('nama_kelas', 'XIIRPL4')->avg('K3');
        $k['r44'] = RplProduktif::where('nama_kelas', 'XIIRPL4')->avg('K4');
        $k['r45'] = ($k['r41'] + $k['r42'] + $k['r43'] + $k['r44']) / 4;

        $k['r51'] = RplProduktif::where('nama_kelas', 'XIIRPL5')->avg('K1');
        $k['r52'] = RplProduktif::where('nama_kelas', 'XIIRPL5')->avg('K2');
        $k['r53'] = RplProduktif::where('nama_kelas', 'XIIRPL5')->avg('K3');
        $k['r54'] = RplProduktif::where('nama_kelas', 'XIIRPL5')->avg('K4');
        $k['r55'] = ($k['r51'] + $k['r52'] + $k['r53'] + $k['r54']) / 4;

        $k['r61'] = RplProduktif::where('nama_kelas', 'XIIRPL6')->avg('K1');
        $k['r62'] = RplProduktif::where('nama_kelas', 'XIIRPL6')->avg('K2');
        $k['r63'] = RplProduktif::where('nama_kelas', 'XIIRPL6')->avg('K3');
        $k['r64'] = RplProduktif::where('nama_kelas', 'XIIRPL6')->avg('K4');
        $k['r65'] = ($k['r61'] + $k['r62'] + $k['r63'] + $k['r64']) / 4;

        $total['k1'] = RplProduktif::all()->avg('K1');
        $total['k2'] = RplProduktif::all()->avg('K2');
        $total['k3'] = RplProduktif::all()->avg('K3');
        $total['k4'] = RplProduktif::all()->avg('K4');
        $total['k5'] = $total['k1'] + $total['k2'] + $total['k3'] + $total['k4'];

        
        $jumlah['k1'] = count(RplProduktif::where('nama_kelas', $nama)->where('K1', '<', 75)->get());
        $jumlah['k2'] = count(RplProduktif::where('nama_kelas', $nama)->where('K2', '<', 75)->get());
        $jumlah['k3'] = count(RplProduktif::where('nama_kelas', $nama)->where('K3', '<', 75)->get());
        $jumlah['k4'] = count(RplProduktif::where('nama_kelas', $nama)->where('K4', '<', 75)->get());
        $jumlah['k5'] = $jumlah['k1'] + $jumlah['k2'] + $jumlah['k3'] + $jumlah['k4'];

        $jumlah['k21'] = count(RplProduktif::where('nama_kelas', $nama)->where('K1', '>=', 75)->get());
        $jumlah['k22'] = count(RplProduktif::where('nama_kelas', $nama)->where('K2', '>=', 75)->get());
        $jumlah['k23'] = count(RplProduktif::where('nama_kelas', $nama)->where('K3', '>=', 75)->get());
        $jumlah['k24'] = count(RplProduktif::where('nama_kelas', $nama)->where('K4', '>=', 75)->get());
        $jumlah['k25'] = $jumlah['k21'] + $jumlah['k22'] + $jumlah['k23'] + $jumlah['k24'];

        if($total['k5'] == 0){
            $rata['k1'] = 0;
            $rata['k2'] = 0;
            $rata['k3'] = 0;
            $rata['k4'] = 0;

            return view('student.dashboard', compact('nilai', 'k', 'nama', 'rata', 'jumlah'));
        }

        $rata['k1'] = $total['k1'];
        $rata['k2'] = $total['k2'];
        $rata['k3'] = $total['k3'];
        $rata['k4'] = $total['k4'];
            return view('student.dashboard', compact('nilai', 'k', 'nama', 'rata', 'jumlah'));
        }
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
