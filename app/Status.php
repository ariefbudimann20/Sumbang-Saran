<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $table = "status";
    protected $fillable = ['nama'];

    public function karyawan(){
        return $this->hasMany(Karyawan::class,'status_id',);
    }
}
