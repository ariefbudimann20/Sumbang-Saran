<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sub_Bagian extends Model
{
    protected $table = 'sub_bagian';
    protected $fillable = ['bagian_id','nama'];

    public function bagian(){
        return $this->belongsTo(Bagian::class,'bagian_id','id');
    }

    public function karyawan(){
        return $this->hasMany(Karyawan::class,'sub_bagian_id');
    }
}
