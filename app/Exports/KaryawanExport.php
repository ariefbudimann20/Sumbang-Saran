<?php

namespace App\Exports;

use App\Karyawan;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Carbon\Carbon;

class KaryawanExport implements FromView
{

    public function view(): View
    {
        $karyawan = Karyawan::with('status','bagian','sub_bagian')->withCount('sumbangsaran')->get();
        $mytime = Carbon::now();
        $date = $mytime->toDateTimeString();
        return view('pages.karyawan.export-excel',compact('karyawan','date'));
    }
}