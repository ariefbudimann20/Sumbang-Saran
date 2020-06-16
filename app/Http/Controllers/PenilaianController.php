<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\PenilaianExport;
use Maatwebsite\Excel\Facades\Excel;
use App\SumbangSaran;
use App\Penilaian;
use App\Karyawan;
use Validator;
use Auth;
use Carbon\Carbon;

class PenilaianController extends Controller
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
        $sumbangsaran = SumbangSaran::with('penilaian','karyawan')->orderBY('created_at','DESC')->get();
        // $sumbangsaran = SumbangSaran::with(['penilaian' => function ($query) {
        //     $query->where('user_id',Auth::user()->id);
        // }, 'karyawan'])->orderBy('created_at','DESC')->get();
        // dd($sumbangsaran);
        return view('pages.penilaian.index',compact('sumbangsaran'));
    }

    public function export_excel() 
    {
        $mytime = Carbon::now();
         return Excel::download(new PenilaianExport, 'Penilaian_'.$mytime->toDateTimeString().'.xlsx');
    }

    public function export_pdf() 
    {
        $mytime = Carbon::now();
        $date = $mytime->toDateTimeString();
        $sumbangsaran = SumbangSaran::with('penilaian','karyawan')->orderBY('created_at','DESC')->get();
        $pdf = \PDF::loadview('pages.penilaian.export-pdf',compact('sumbangsaran','date'));
        $pdf->setPaper('legal', 'landscape');
        return $pdf->download('Penilaian_'.$date.'.pdf');
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
        $messages = [
            'required' => ':attribute Harus Di Isi',
        ];
        $validator = Validator::make($request->all(),[
            'latarbelakang_ide'    => 'required',  
            'kondisi_awal'         => 'required',  
            'kondisi_akhir'        => 'required',  
            'biaya'                => 'required',  
            'manfaat'              => 'required', 
            'nilai'                => 'required', 
            'nilai'                => 'required',
        ],$messages);
  
        if ($validator->fails()) {
            // dd($request->all());
             return back()->withInput($request->input())->withErrors($validator->errors());
        }else{

            Penilaian::create([
                'sumbang_saran_id'     => $request->sumbang_saran_id,
                'karyawan_id'          => $request->karyawan_id,
                'user_id'              => Auth::user()->id,
                'latarbelakang_ide'    => $request->latarbelakang_ide, 
                'kondisi_awal'         => $request->kondisi_awal, 
                'kondisi_akhir'        => $request->kondisi_akhir, 
                'biaya'                => $request->biaya, 
                'manfaat'              => $request->manfaat, 
                'nilai'                => $request->nilai, 
            ]);
                
            return back()->with('success', 'Data Penilaian Berhasil Di Simpan');
        }
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
        // dd($ss);
        return view('pages.penilaian.show',compact('ss'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ss = Penilaian::with('karyawan','sumbangsaran')->findOrFail($id);

        return view('pages.penilaian.edit',compact('ss'));
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
        $messages = [
            'required' => ':attribute Harus Di Isi',
        ];
        $validator = Validator::make($request->all(),[
            'latarbelakang_ide'    => 'required',  
            'kondisi_awal'         => 'required',  
            'kondisi_akhir'        => 'required',  
            'biaya'                => 'required',  
            'manfaat'              => 'required', 
            'nilai'                => 'required', 
            'nilai'                => 'required',
        ],$messages);
  
        if ($validator->fails()) {
            // dd($request->all());
             return back()->withInput($request->input())->withErrors($validator->errors());
        }else{

            $penilaian = Penilaian::with('karyawan','sumbangsaran')->findOrFail($id);
            $penilaian->latarbelakang_ide = $request->latarbelakang_ide; 
            $penilaian->kondisi_awal      = $request->kondisi_awal; 
            $penilaian->kondisi_akhir     = $request->kondisi_akhir; 
            $penilaian->biaya             = $request->biaya; 
            $penilaian->manfaat           = $request->manfaat; 
            $penilaian->nilai             = $request->nilai;
            $penilaian->save(); 
                
            return back()->with('success', 'Data Penilaian Berhasil Di Simpan');
        }
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
