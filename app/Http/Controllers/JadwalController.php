<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jadwal;
use App\Penilaian;
use App\SumbangSaran;
use App\Karyawan;
use Validator;
use Alert;
use Carbon\Carbon;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jadwal = Jadwal::orderBY('created_at','DESC')->get();
        // dd($jadwal);
        return view('pages.jadwal.index',compact('jadwal'));
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
 
        if($request->mulai <= $request->selesai ){
            jadwal::create([
                'mulai' => $request->mulai,
                'selesai' => $request->selesai,
                'status'   => 0
            ]);
    
            return back()->with('success','Data Jadwal Berhasil Di Simpan');
        }
        Alert::error('Gagal', 'Waktu Selesai Tidak Boleh Kurang Dari Waktu Mulai');
        return back();
       
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
        $jadwal = Jadwal::findOrFail($id);
        
        return view('pages.jadwal.edit',compact('jadwal'));
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
            'status'        => 'required',
        ],$messages);
  
        if ($validator->fails()) {
             return back()->withInput($request->input())->withErrors($validator->errors());
        }else{

            $jadwal = Jadwal::findOrFail($id);
            $jadwal->status = $request->status;
            $jadwal->save();
                
            return back()->with('success', 'Data Jadwal Berhasil Di Simpan');
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
        $jadwal = Jadwal::findOrFail($id);
        $jadwal->delete();

        return response()->json();
    }
}
