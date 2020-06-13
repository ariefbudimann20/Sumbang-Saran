<?php

namespace App\Exports;

use App\SumbangSaran;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Carbon\Carbon;

class SumbangSaranExport implements FromView
{

    public function view(): View
    {
        $sumbangsaran = SumbangSaran::all();
        $mytime = Carbon::now();
        $date = $mytime->toDateTimeString();
        return view('pages.sumbang-saran.export-excel',compact('sumbangsaran','date'));
    }
}