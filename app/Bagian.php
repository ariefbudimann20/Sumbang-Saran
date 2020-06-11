<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bagian extends Model
{
    protected $table = 'bagian';
    protected $fillable = ['nama'];

    public function sub_bagian(){
        return $this->hasMany(Sub_Bagian::class,'bagian_id');
    }

    public function karyawan(){
        return $this->hasMany(Karyawan::class,'bagian_id',);
    }
}
