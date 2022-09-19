<?php

namespace App\Http\Controllers\API;

use App\Model\Laporan;
use App\Model\Proses;
use App\Model\SA_MasterUser as User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\GenerateMailController;
use Illuminate\Support\Carbon;

use Auth;

class LaporanRtController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        $laporan = Laporan::all();

        $today = Laporan::join('users','users.id_users','tbl_laporan.id_users')
        ->where('users.nomor_rt',$user->nomor_rt)
        ->whereDate('tbl_laporan.created_at',Carbon::today())
        ->whereYear('tbl_laporan.created_at',Carbon::now()->year)
        ->count();
        $week = Laporan::join('users','users.id_users','tbl_laporan.id_users')
        ->where('users.nomor_rt',$user->nomor_rt)
        ->where('tbl_laporan.created_at', '>', Carbon::now()->startOfWeek())
        ->where('tbl_laporan.created_at', '<', Carbon::now()->endOfWeek())
        ->whereYear('tbl_laporan.created_at',Carbon::now()->year)
        ->count();
        $month = Laporan::join('users','users.id_users','tbl_laporan.id_users')
        ->where('users.nomor_rt',$user->nomor_rt)
        ->whereMonth('tbl_laporan.created_at',Carbon::now()->month)
        ->whereYear('tbl_laporan.created_at',Carbon::now()->year)
        ->count();
        $notread = Laporan::join('users','users.id_users','tbl_laporan.id_users')
        ->where('users.nomor_rt',$user->nomor_rt)
        ->where('status','menunggu')
        ->count();

        // return $laporan;

        return view('pages/rt/home_rt',[
            'laporan' => $laporan,
            'today' => $today,
            'week' => $week,
            'month' => $month,
            'notread' => $notread,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $laporan = Laporan::find($id);

        $proses = Proses::join('tbl_laporan','tbl_laporan.id','tbl_proses.id_laporan')
        ->where('tbl_proses.id_laporan',$laporan->id)
        ->orderBy('tbl_proses.created_at')
        ->get();

        return view('pages/rt/edit_aksi',[
            'aksi' => $laporan,
            'proses' => $proses
            ]);
    }

    public function update(Request $request,$id)
    {
        // nothing
    }

    public function updateaksi(Request $request,$id)
    {
        $user = Auth::user();

        $laporan = Laporan::findOrFail($id);
        $laporan->aksi = $request->aksi;
        $laporan->save();

        $proses = Proses::create([
            "id_laporan" => $laporan->id,
            "keterangan" => $request->keterangan
        ]);

        $warga = User::where('id_users',$laporan->id_users)->first();

        $module = "update progress aksi";
        $id_users = $user->id_users;
        $nama = $warga->name;
        $email = $warga->email;
        $text = "update progress laporan dengan judul ".$laporan->judul." (".$request->aksi.") , keterangan : ".$request->keterangan;

        $mail = new GenerateMailController;
        $mail->generateMail($module,$id_users,$email,$nama,$text);

        return redirect()->route('rt.dashboard-rt.index')->with('status', "berhasil edit data");

    }

    public function respon(Request $request, $id)
    {
        $user = Auth::user();
        $respon = Laporan::findOrFail($id);

        $warga = User::where('id_users',$respon->id_users)->first();

        $module = "respon rt";
        $id_users = $user->id_users;
        $nama = $warga->name;

        $email = $warga->email;
        $text = "ketua RT telah merespon laporan anda yang berjudul : ".$respon->judul;

        $respon->update([
            "status" => "direspon"
        ]);

        $mail = new GenerateMailController;
        $mail->generateMail($module,$id_users,$email,$nama,$text);

        return redirect()->route('rt.dashboard-rt.index')->with('status', "berhasil memberikan respon");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
