<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\siswa;

use Session;

use App\Exports\SiswaExport;
use App\Imports\SiswaImport;
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

    public function excelExport()
    {
        $date=date("Y-m-d h:i:s", time());
        $fileName = 'Excel '.$date.'.xlsx';
        return Excel::download(new SiswaExport, $fileName);
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
}
