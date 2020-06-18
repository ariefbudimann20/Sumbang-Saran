<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\HasRole;
use Validator;
use HasRoles;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();
        return view('pages.user.index',compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.user.create');
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
            'required'  => ':attribute Harus Di Isi',
            'unique'    => ':attribute Harus Berbeda',
            'same'      => ':attribute dan :other Tidak Sama.',
        ];

        $validator = Validator::make($request->all(),[
            'username'      => 'required|unique:users,username',
            'name'          => 'required',
            'email'         => 'required|email|unique:users,email',
            'password'      => 'required|min:6|same:password_confirmation',
            'hak_akses'     => 'required',
        ],$messages);

        if ($validator->fails()) {
             return back()->withErrors($validator->errors());
        }else{
                if (empty($request->foto)) {
                    $namapic = "default.jpg";
                }else{       
                    $namapic = request()->foto->getClientOriginalName();
                    request()->foto->move(public_path('assets/img/user'),$namapic);
                }
    
        $user  = User::create([
                    'username'      => $request->username,
                    'name'          => $request->name,
                    'email'         => $request->email,
                    'password'      => Hash::make($request->password),
                    'foto'          => $namapic,
                    'hak_akses'     => $request->hak_akses,
                    
                ]);

                HasRole::create([
                    'role_id'       => $request->hak_akses,
                    'model_type'    => 'App\User',
                    'model_id'      =>  $user->id
                ]);
        
            return back()->with('success','Data User Berhasil Di Simpan');
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
        $item   = User::findOrFail($id);

        return view('pages.user.edit',compact('item'));
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
            'required'  => ':attribute Harus Di Isi',
            'unique'    => ':attribute Harus Berbeda',
            'same'      => ':attribute dan :other Tidak Sama.',
        ];

        $validator = Validator::make($request->all(),[
            'username'      => 'required|unique:users,username,' . $id,
            'name'          => 'required',
            'email'         => 'required|email|unique:users,email,' . $id,
            'password'      => 'same:password_confirmation',
            'hak_akses'     => 'required',
        ],$messages);

        if ($validator->fails()) {
             return back()->withErrors($validator->errors());
        }else{
                if (!empty($request->password))
                {
                    $request->password = Hash::make($request->password);
                }

                // if (!empty($request->foto)) 
                // {     
                //     $user->foto = request()->foto->getClientOriginalName();
                //     request()->foto->move(public_path('assets/img/user'),$user->foto);
                // }

                if ($request->hasFile('foto')){
                    $namapic = request()->foto->getClientOriginalName();
                    request()->foto->move(public_path('assets/img/user'),$namapic);
                }else {   
                    $namapic = $request->input('foto_old');
                }
                // dd($namapic);
                $user               = User::findOrFail($id);
                $user->username     = $request->username;
                $user->name         = $request->name;
                $user->email        = $request->email;
                $user->hak_akses    = $request->hak_akses;
                $user->foto         = $namapic;
                $user->save();

                $akses              = HasRole::where('model_id',$id)->firstOrFail();
                $akses->role_id     = $request->hak_akses;
                $akses->model_type  = $request->model_type;
                $akses->save();

                return back()->with('success','Data User Berhasil Di Ubah');
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
        $user = User::findOrFail($id);
        $user->delete();

        return response()->json();
    }
}
