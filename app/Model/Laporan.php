<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    protected $table = "tbl_laporan";

    protected $fillable = ['id_users','gambar','laporan','status','aksi','judul','lat','long'];

    public function users()
    {
        return $this->belongsTo('App\Model\SA_MasterUser','id_users');
    }

    public function proses()
    {
        return $this->hasMany('App\Model\Proses','id_laporan');
    }
}
