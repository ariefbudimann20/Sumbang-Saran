<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    protected $table = 'jadwal';
    protected $fillable = ['mulai','selesai','status'];
    // protected $fillable = ['selesai','pemenang','status'];
}
