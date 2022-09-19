<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class RT extends Model
{
    protected $table = "tbl_rt";

    protected $fillable = ['nomor_rt','alamat'];
}
