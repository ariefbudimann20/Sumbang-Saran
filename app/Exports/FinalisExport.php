<?php

namespace App\Exports;

use App\SumbangSaran;
use App\Penilaian;
use App\Karyawan;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Carbon\Carbon;
use Auth;

class FinalisExport implements FromView
{

    public function view(): View
    {
        $sumbangsaran = SumbangSaran::with('karyawan','penilaian')->get();
        $sumbangsaran -> map(function ($item, $key){
            return $item['nilai_total'] = $item->penilaian()->sum('nilai');
        });

        $sorted = $sumbangsaran->sortByDesc('nilai_total');
        $karyawan = $sorted->values()->all();
        $mytime = Carbon::now();
        $date = $mytime->toDateTimeString();
        return view('pages.finalis.export-excel',compact('karyawan','date'));
    }
}