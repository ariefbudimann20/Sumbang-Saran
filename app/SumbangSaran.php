<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SumbangSaran extends Model
{
    protected $table ="sumbang_saran";
    protected $fillable = ['nik','nama','bagian','ext','judul','foto','kondisi_awal','kondisi_akhir','manfaat'];
}
