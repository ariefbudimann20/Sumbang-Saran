<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SumbangSaran;
use App\Karyawan;

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
    public function index()
    {   
        $sumbangsaran = SumbangSaran::all();
        $karyawan = Karyawan::all();
        return view('pages.dashboard',compact('sumbangsaran','karyawan'));
    }
}
