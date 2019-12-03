<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\siswa;

use Session;

use App\Exports\SiswaExport;

use App\Imports\SiswaImport;

use App\Exports\Rpl1;

use App\Exports\Rpl2;

use App\Exports\Rpl3;

use App\Exports\Rpl4;

use App\Exports\Rpl5;

use App\Exports\Rpl6;

use Maatwebsite\Excel\Facades\Excel;

use App\Http\Controllers\Controller;

class ExcelController extends Controller
{
    public function index()
    {
        $siswa = siswa::all();
        return view('view', ['siswa'=>$siswa]);
    }

    public function view()
    {
        $siswa = siswa::all();
        return view('siswa', ['siswa'=>$siswa]);
    }

    public function excelExport($nama)
    {
        if($nama == 'XIIRPL1'){
            return redirect('api/v1/event/export/class/XIIRPL1');
        } else if($nama == 'XIIRPL2'){
            return redirect('api/v1/event/export/class/XIIRPL2');
        } else if($nama == 'XIIRPL3'){
            return redirect('api/v1/event/export/class/XIIRPL3');
        } else if($nama == 'XIIRPL4'){
            return redirect('api/v1/event/export/class/XIIRPL4');
        } else if($nama == 'XIIRPL5'){
            return redirect('api/v1/event/export/class/XIIRPL5');
        } else {
            return redirect('api/v1/event/export/class/XIIRPL6');
        }
    }

    public function import_excel(Request $request)
    {
        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);

        $file = $request->file('file');

        $nama_file = rand().$file->getClientOriginalName();

        $file->move('file_siswa', $nama_file);

        Excel::import(new SiswaImport, public_path('/file_siswa/'.$nama_file));

        Session::flash('sukses', 'Data Siswa Berhasil di Import');

        return redirect('/excel/import');
    }

    public function importExcel(Request $request)
    {
        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);

        $file = $request->file('file');

        $nama_file = rand().$file->getClientOriginalName();

        $file->move('file_siswa', $nama_file);

        Excel::import(new SiswaImport, public_path('/file_siswa/'.$nama_file));

        Session::flash('Sukses', 'Data Siswa Berhasil di Import');

        return redirect('api/v1/teacher/XIIRPL1');
    }

    public function exportXIIRPL1()
    {
        $date=date("Y-m-d h:i:s", time());
        $fileName = 'Excel '.$date.'.xlsx';
        return Excel::download(new Rpl1, $fileName);        
    }

    public function exportXIIRPL2()
    {
        $date=date("Y-m-d h:i:s", time());
        $fileName = 'Excel '.$date.'.xlsx';
        return Excel::download(new Rpl2, $fileName);        
    }

    public function exportXIIRPL3()
    {
        $date=date("Y-m-d h:i:s", time());
        $fileName = 'Excel '.$date.'.xlsx';
        return Excel::download(new Rpl3, $fileName);        
    }

    public function exportXIIRPL4()
    {
        $date=date("Y-m-d h:i:s", time());
        $fileName = 'Excel '.$date.'.xlsx';
        return Excel::download(new Rpl4, $fileName);        
    }

    public function exportXIIRPL5()
    {
        $date=date("Y-m-d h:i:s", time());
        $fileName = 'Excel '.$date.'.xlsx';
        return Excel::download(new Rpl5, $fileName);        
    }

    public function exportXIIRPL6()
    {
        $date=date("Y-m-d h:i:s", time());
        $fileName = 'Excel '.$date.'.xlsx';
        return Excel::download(new Rpl6, $fileName);        
    }
}
