<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bagian;
use App\Sub_Bagian;
use App\Karyawan;
use App\SumbangSaran;
use Validator;

class Sub_BagianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sub_bagian = Sub_Bagian::with('bagian')->orderBY('created_at','DESC')->get();

        return view('pages.sub_bagian.index',compact('sub_bagian'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bagian = Bagian::all();

        return view('pages.sub_bagian.create',compact('bagian'));
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
            'max' => ':attribute Harus Di Isi maksimal :max Digit',
        ];
        $validator = Validator::make($request->all(),[
            'nama'           => 'required|max:50',
            'bagian_id'      => 'required'
        ],$messages);
  
        if ($validator->fails()) {
            // dd($request->all());
             return back()->withInput($request->input())->withErrors($validator->errors());
        }else{
            Sub_Bagian::create([
                'bagian_id' => $request->bagian_id,
                'nama'  => $request->nama
            ]);
    
            return back()->with('success','Data Sub Bagian Berhasil Di Simpan');
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
        $bagian     = Bagian::all();
        $sub_bagian = Sub_Bagian::with('bagian')->findOrFail($id);
        
        return view('pages.sub_bagian.edit',compact('sub_bagian','bagian'));
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
            'max' => ':attribute Harus Di Isi maksimal :max Digit',
        ];
        $validator = Validator::make($request->all(),[
            'nama'           => 'required|max:15',
            'bagian_id'      => 'required'
        ],$messages);
  
        if ($validator->fails()) {
            // dd($request->all());
             return back()->withInput($request->input())->withErrors($validator->errors());
        }else{
            $sub_bagian = Sub_Bagian::findOrFail($id);
            $sub_bagian->bagian_id = $request->bagian_id;
            $sub_bagian->nama = $request->nama;
            $sub_bagian->save();

            return back()->with('success','Data Bagian Berhasil Di Update');
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
        
        $sub_bagian = Sub_Bagian::findOrFail($id);
        $sub_bagian->delete();

        return response()->json();
    }
}
