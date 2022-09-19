<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Proses extends Model
{
    protected $table = "tbl_proses";

    protected $fillable = ['id_laporan','keterangan'];

    public function laporan()
    {
        return $this->belongsTo('App\Model\Laporan','id_laporan','id');
    }
}
