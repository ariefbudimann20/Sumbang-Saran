<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    protected $table = "karyawan";
    protected $fillable = ['nik','nama','status_id','bagian_id','sub_bagian_id'];

    public function sumbangsaran(){
        return $this->hasMany(SumbangSaran::class,'karyawan_id');
    }

    public function penilaian(){
        return $this->hasMany(Penilaian::class,'karyawan_id');
    }

    public function status(){
        return $this->belongsTo(Status::class,'status_id','id');
    }

    public function bagian(){
        return $this->belongsTo(Bagian::class,'bagian_id','id');
    }

    public function sub_bagian(){
        return $this->belongsTo(Sub_Bagian::class,'sub_bagian_id','id');
    }

    public function juara1(){
        return $this->hasMany(Jadwal::class,'juara1');
    }
    public function juara2(){
        return $this->hasMany(Jadwal::class,'juara2');
    }
    public function juara3(){
        return $this->hasMany(Jadwal::class,'juara3');
    }
}
