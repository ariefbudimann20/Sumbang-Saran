<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Juara extends Model
{
    protected $table = "juara";
    protected $fillable = ['juara1','juara2','juara3','periode_id'];

    public function karyawan1(){
        return $this->belongsTo(Penilaian::class,'juara1','id');
    }
    public function karyawan2(){
        return $this->belongsTo(Penilaian::class,'juara2','id');
    }
    public function karyawan3(){
        return $this->belongsTo(Penilaian::class,'juara3','id');
    }
    public function jadwal(){
        return $this->belongsTo(Jadwal::class,'periode_id','id');
    }
    
    

}
