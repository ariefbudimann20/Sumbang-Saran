<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SumbangSaran;
use App\Karyawan;
use App\Penilaian;
use App\User;
use App\Bagian;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function admin()
    {   
        $sumbangsaran = SumbangSaran::all();
        $karyawan = Karyawan::all();
        $user = User::all();
        $bagian = Bagian::all();

        return view('pages.dashboard',compact('sumbangsaran','karyawan','user','bagian'));
    }

    public function penilai()
    {   
        $sumbangsaran = SumbangSaran::all();
        $karyawan = Karyawan::all();
        $peserta = Penilaian::with('karyawan','sumbangsaran')->count();
        $penilaian = Penilaian::all();

        return view('pages.dashboard',compact('sumbangsaran','karyawan','peserta','penilaian'));
    }
}
