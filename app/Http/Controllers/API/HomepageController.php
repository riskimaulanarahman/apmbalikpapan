<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\Laporan;
use App\Model\Proses;
use Illuminate\Support\Carbon;

class HomepageController extends Controller
{
    public function index()
    {
        $terkini = Laporan::where('status','direspon')
        ->where('aksi','menunggu')
        // ->whereNull('keterangan')
        // ->leftJoin('tbl_proses','tbl_laporan.id','tbl_proses.id_laporan')
        ->orderBy('tbl_laporan.created_at','desc')
        ->get();

        $proses = Laporan::with('proses')->where('status','direspon')
        ->where('aksi','proses')
        // ->whereNotNull('keterangan')
        // ->leftJoin('tbl_proses','tbl_laporan.id','tbl_proses.id_laporan')
        // ->groupBy('tbl_proses.id_laporan')
        ->orderBy('tbl_laporan.updated_at','desc')
        ->get();

        // return $proses;

        $selesai = Laporan::where('status','direspon')
        ->where('aksi','selesai')
        ->orderBy('tbl_laporan.updated_at','desc')
        ->get();

        // return $proses;

        // * dd($terkini);

        return view('pages/front/homepage',[
            'terkini' => $terkini,
            'proses' => $proses,
            'selesai' => $selesai,
        ]);
    }
}
