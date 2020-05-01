<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ext extends Model
{
    protected $table = 'ext';
    protected $fillable = ['bagian_id','nama'];

    public function bagian(){
        return $this->belongsTo(Bagian::class,'bagian_id','id');
    }
}
