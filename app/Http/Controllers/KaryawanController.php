<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\KaryawanExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Karyawan;
use App\SumbangSaran;
use App\Penilaian;
use Carbon\Carbon;
use PDF;


class KaryawanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $karyawan = Karyawan::with('status','bagian','sub_bagian')->orderBY('created_at','DESC')->withCount('sumbangsaran')->get();
        return view('pages.karyawan.index',compact('karyawan'));
    }

    public function export_excel() 
    {
        $mytime = Carbon::now();
         return Excel::download(new KaryawanExport, 'Karyawan_'.$mytime->toDateTimeString().'.xlsx');
    }
    
    public function export_pdf() 
    {
        $mytime = Carbon::now();
        $date = $mytime->toDateTimeString();
        $karyawan = Karyawan::with('status','bagian','sub_bagian')->withCount('sumbangsaran')->get();
        $pdf = \PDF::loadview('pages.karyawan.export-pdf',compact('karyawan','date'));
        $pdf->setPaper('legal', 'landscape');
        return $pdf->download('Karyawan_'.$date.'.pdf');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $karyawan = Karyawan::findorFail($id);
        $karyawan->delete();

        $karyawan = SumbangSaran::where('karyawan_id', $id);
        $karyawan->delete();

        $penilaian = Penilaian::where('karyawan_id',$id);
        $penilaian->delete();


        return back()->with('success','Data Karyawan Berhasil Di Hapus');
    }
}
