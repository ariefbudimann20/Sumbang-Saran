<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    protected $table = 'jadwal';
    protected $fillable = ['mulai','selesai','status'];
    
  
    public function juara(){
        return $this->belongsTo(Juara::class,'periode_id','id');
    }
    
    
}
