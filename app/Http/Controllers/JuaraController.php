<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Juara;
use App\SumbangSaran;
use App\Karyawan;
use App\Jadwal;
use Validator;

class JuaraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $juara = Juara::with('karyawan1','karyawan2','karyawan3','jadwal')->orderBy('created_at','DESC')->get();
        // dd($juara);
        return view ('pages.juara.index',compact('juara'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sumbangsaran = SumbangSaran::with('karyawan','penilaian')->get();
        $sumbangsaran -> map(function ($item, $key){
            return $item['nilai_total'] = $item->penilaian()->sum('nilai');
        });
        $sumbangsaran -> map(function ($item, $key){
            return $item['jml_sdh_nilai'] = $item->penilaian()->count();
        });

        $sorted = $sumbangsaran->sortByDesc('nilai_total');
        $finalis = $sorted->values()->all();
        $periode = Jadwal::where('status','=',1)->get();
        // dd($finalis);
        return view('pages.juara.create',compact('finalis','periode'));
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
            'juara1'        => 'required',
            'juara2'        => 'required',
            'juara3'        => 'required',
            'periode_id'    => 'required',
        ],$messages);
  
        if ($validator->fails()) {
             return back()->withInput($request->input())->withErrors($validator->errors());
        }else{

            Juara::create([
                'juara1' => $request->juara1,
                'juara2' => $request->juara2,
                'juara3' => $request->juara3,
                'periode_id' => $request->periode_id,
            ]);
                
            return back()->with('success', 'Data Jadwal Berhasil Di Simpan');
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
        $sumbangsaran = SumbangSaran::with('karyawan','penilaian')->get();
        $sumbangsaran -> map(function ($item, $key){
            return $item['nilai_total'] = $item->penilaian()->sum('nilai');
        });
        $sumbangsaran -> map(function ($item, $key){
            return $item['jml_sdh_nilai'] = $item->penilaian()->count();
        });

        $sorted = $sumbangsaran->sortByDesc('nilai_total');
        $finalis = $sorted->values()->all();
        $juara = Juara::findOrFail($id);
        $periode = Jadwal::where('status','=',1)->get();
        
        return view('pages.juara.edit',compact('finalis','juara','periode'));
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
            'juara1'        => 'required',
            'juara2'        => 'required',
            'juara3'        => 'required',
        ],$messages);
  
        if ($validator->fails()) {
             return back()->withInput($request->input())->withErrors($validator->errors());
        }else{

            $juara = Juara::findOrFail($id);
            $juara->juara1 = $request->juara1;
            $juara->juara2 = $request->juara2;
            $juara->juara3 = $request->juara3;
            $juara->periode_id = $request->periode_id;
            $juara->save();
                
            return back()->with('success', 'Data Jadwal Berhasil Di Simpan');
        }            
    }

   /**
     * Re,ove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $juara = Juara::findOrFail($id);
        $juara->delete();

        return response()->json();
        // return back()->with('success','Data Berhasil DI Hapus');
    }
}
