<?php

namespace App\Exports;

use App\SumbangSaran;
use App\Penilaian;
use App\Karyawan;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Carbon\Carbon;
use Auth;

class PenilaianExport implements FromView
{

    public function view(): View
    {
        $sumbangsaran = SumbangSaran::with('penilaian','karyawan')->orderBY('created_at','DESC')->get();
        $mytime = Carbon::now();
        $date = $mytime->toDateTimeString();
        return view('pages.penilaian.export-excel',compact('sumbangsaran','date'));
    }
}