<?php

namespace App\Http\Controllers\API;

use App\Model\Kecamatan;
use App\Model\Kelurahan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ListController extends Controller
{
    public function listKecamatan() {
        return Kecamatan::select('id','kode_kecamatan','nama_kecamatan')->get();
    }
    public function listKelurahan() {
        return Kelurahan::select('id','kode_kecamatan','kode_kelurahan','nama_kelurahan')->get();
    }
}
