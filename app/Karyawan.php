<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    protected $table = "karyawan";
    protected $fillable = ['nik','nama','bagian','ext'];

    public function sumbangsaran(){
        return $this->hasMany(SumbangSaran::class,'karyawan_id');
    }

    public function penilaian(){
        return $this->hasMany(Penilaian::class,'karyawan_id');
    }
}
