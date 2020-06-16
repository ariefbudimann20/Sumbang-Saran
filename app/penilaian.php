<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penilaian extends Model
{
    protected $table = 'penilaian';
    protected $fillable = ['sumbang_saran_id','karyawan_id','user_id','latarbelakang_ide','kondisi_awal','kondisi_akhir','biaya','manfaat','nilai'];

    public function sumbangsaran(){
        return $this->belongsTo(SumbangSaran::class,'sumbang_saran_id','id');
    }

    public function karyawan(){
        return $this->belongsTo(Karyawan::class,'karyawan_id','id');
    }

    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }

    
}
