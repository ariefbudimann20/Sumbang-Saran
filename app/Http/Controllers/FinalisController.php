<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\FinalisExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Karyawan;
use App\Penilaian;
use App\SumbangSaran;
use App\User;
use DB;
use Carbon\Carbon;

class FinalisController extends Controller
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
        $sumbangsaran = SumbangSaran::with('karyawan','penilaian')->get();
        $sumbangsaran -> map(function ($item, $key){
            return $item['nilai_total'] = $item->penilaian()->sum('nilai');
        });
        $sumbangsaran -> map(function ($item, $key){
            return $item['jml_sdh_nilai'] = $item->penilaian()->count();
        });

        $sorted = $sumbangsaran->sortByDesc('nilai_total');
        $karyawan = $sorted->values()->all();

        $penilai = User::where('hak_akses',2)->count();
        // dd($karyawan);
        return view('pages.finalis.index',compact('karyawan','penilai'));
    }

    public function export_excel() 
    {
        $mytime = Carbon::now();
         return Excel::download(new FinalisExport, 'Finalis_'.$mytime->toDateTimeString().'.xlsx');
    }

    public function export_pdf() 
    {
        $mytime = Carbon::now();
        $date = $mytime->toDateTimeString();
        $sumbangsaran = SumbangSaran::with('karyawan','penilaian')->get();
        $sumbangsaran -> map(function ($item, $key){
            return $item['nilai_total'] = $item->penilaian()->sum('nilai');
        });

        $sorted = $sumbangsaran->sortByDesc('nilai_total');
        $karyawan = $sorted->values()->all();
        $pdf = \PDF::loadview('pages.finalis.export-pdf',compact('karyawan','date'));
        $pdf->setPaper('legal', 'landscape');
        return $pdf->download('Finalis_'.$date.'.pdf');
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
        //
    }
}
