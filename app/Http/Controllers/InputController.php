<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;
use Validator;
use Auth;
use Alert;
use App\SumbangSaran;
use App\Karyawan;
use App\Bagian;
use App\Sub_Bagian;
use App\Jadwal;
use App\Status;

class InputController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $status         = Status::all();
        $bagian         = Bagian::all();
        $sub_bagian     = Sub_Bagian::all();
        $jadwal         = Jadwal::where('status','=',0)->first();

        return view('form',compact('status','bagian','sub_bagian','jadwal'));
    }

    public function search(Request $request)
    {
        // $bagian_id = $request->bagian;
        $bagian_id  = $request->get('bagian');
        $sub_bagian = Sub_Bagian::where('bagian_id','=',$bagian_id)->get();

        return Response::json($sub_bagian);

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
            'min' => ':attribute Harus Di Isi minimal :min Digit',
            'max' => ':attribute Harus Di Isi maksimal :max Digit'
        ];
        $validator = Validator::make($request->all(),[
            // 'nik'           => 'required|min:5|max:10',
            'nama'              => 'required',
            'bagian'            => 'required',
            'sub_bagian'        => 'required',
            'judul'             => 'required',
            'latar_belakang'    => 'required',
            'kondisi_awal'      => 'required',
            'kondisi_akhir'     => 'required',
            'biaya'             => 'required',
            'manfaat'           => 'required'
        ],$messages);
  
        if ($validator->fails()) {
            // dd($request->all());
             return back()->withInput($request->input())->withErrors($validator->errors());
        }else{
            if (empty($request->attachment)) {
                $namapic = "default.jpg";
            }else{       
                $namapic = request()->nik."_".request()->attachment->getClientOriginalName();
                request()->attachment->move(public_path('assets/attachment'),$namapic);
            }
                if($request->nik == 0) {
                    $nik = 0;
                    $flight = Karyawan::firstOrCreate([
                        'nik'          => $nik,
                        'nama'          => $request->nama,
                        'status_id'     => $request->status,
                        'bagian_id'     => $request->bagian,
                        'sub_bagian_id' => $request->sub_bagian,
                    ]);
                    SumbangSaran::create([
                        'karyawan_id'   => $flight->id,
                        'judul'         => $request->judul,
                        'attachment'    => $namapic,
                        'latar_belakang'=> $request->latar_belakang,
                        'kondisi_awal'  => $request->kondisi_awal,
                        'kondisi_akhir' => $request->kondisi_akhir,
                        'biaya'         => $request->biaya,
                        'manfaat'       => $request->manfaat,
                        'periode'       => $request->periode
                    ]);
                }else{
                    $nik = $request->nik;
                    
                    $karyawan    = Karyawan::where('nik',$nik)->first();
                    // dd($karyawan->id);
                    if($karyawan) {
                        SumbangSaran::create([
                            'karyawan_id'   => $karyawan->id,
                            'judul'         => $request->judul,
                            'attachment'    => $namapic,
                            'latar_belakang'=> $request->latar_belakang,
                            'kondisi_awal'  => $request->kondisi_awal,
                            'kondisi_akhir' => $request->kondisi_akhir,
                            'biaya'         => $request->biaya,
                            'manfaat'       => $request->manfaat,
                            'periode'       => $request->periode
                        ]);

                    }else{
                        $kyn = Karyawan::create([
                            'nik'           => $request ->nik,
                            'nama'          => $request->nama,
                            'status_id'     => $request->status,
                            'bagian_id'     => $request->bagian,
                            'sub_bagian_id' => $request->sub_bagian,
                        ]);
                        
                        SumbangSaran::create([
                            'karyawan_id'   => $kyn->id,
                            'judul'         => $request->judul,
                            'attachment'    => $namapic,
                            'latar_belakang'=> $request->latar_belakang,
                            'kondisi_awal'  => $request->kondisi_awal,
                            'kondisi_akhir' => $request->kondisi_akhir,
                            'biaya'         => $request->biaya,
                            'manfaat'       => $request->manfaat,
                            'periode'       => $request->periode
                        ]);
                    }
                }
            Alert::success('Success', 'Terima Kasih Sudah Berpartipasi Untuk Sumbang Saran');
            Auth::logout();
            return redirect('/');
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
