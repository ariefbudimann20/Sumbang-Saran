<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    protected $table = 'jadwal';
    protected $fillable = ['mulai','selesai','status','juara1','juara2','juara3'];
    // protected $fillable = ['selesai','pemenang','status'];
    
    public function juara1(){
        return $this->belongsTo(Karyawan::class,'juara1','id');
    }
    public function juara2(){
        return $this->belongsTo(Karyawan::class,'juara2','id');
    }
    public function juara3(){
        return $this->belongsTo(Karyawan::class,'juara3','id');
    }
    
    
}
