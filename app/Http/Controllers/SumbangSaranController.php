<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\SumbangSaranExport;
use Maatwebsite\Excel\Facades\Excel;
use Validator;
use App\SumbangSaran;
use App\Karyawan;
use App\Penilaian;
use App\Jadwal;
use Carbon\Carbon;
use PDF;

class SumbangSaranController extends Controller
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
        $sumbangsaran = SumbangSaran::with('karyawan')->orderBY('created_at','DESC')->get();
        $jadwal         = Jadwal::where('status','=',0)->first();
        //dd($sumbangsaran);
        return view('pages.sumbang-saran.index',compact('sumbangsaran','jadwal'));
    }

    public function export_excel() 
    {
        $mytime = Carbon::now();
         return Excel::download(new SumbangSaranExport, 'Sumbang Saran_'.$mytime->toDateTimeString().'.xlsx');
    }
    
    public function export_pdf() 
    {
        $mytime = Carbon::now();
        $date = $mytime->toDateTimeString();
        $sumbangsaran = SumbangSaran::with('karyawan')->orderBY('created_at','DESC')->get(); 
        $pdf = \PDF::loadview('pages.sumbang-saran.export-pdf',compact('sumbangsaran','date'));
        $pdf->setPaper('legal', 'landscape');
        return $pdf->download('Sumbang Saran_'.$date.'.pdf');
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
      
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ss = SumbangSaran::with('karyawan')->findorFail($id);

        return view('pages.sumbang-saran.show',compact('ss'));
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
        $ss = SumbangSaran::findOrFail($id);
        $ss->delete();

        return response()->json();
        // return back()->with('success','Data Sumbang Saran Berhasil Di Hapus');
    }

    public function deleteall()
    {
        $ss = SumbangSaran::whereNotNull('id')->delete();

        // return response()->json();
         return back()->with('success','Data Sumbang Saran Berhasil Di Hapus');
    }
}
