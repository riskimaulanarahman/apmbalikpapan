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

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $laporanxidusers = 'tbl_laporan.id_users';

    public function indexadmin()
    {

        $today = Laporan::whereDate('created_at',Carbon::today())->count();
        $week = Laporan::where('created_at', '>', Carbon::now()->startOfWeek())
            ->where('created_at', '<', Carbon::now()->endOfWeek())
            ->count();
        $month = Laporan::whereMonth('created_at',Carbon::now()->month)
        ->whereYear('created_at',Carbon::now()->year)
        ->count();
        $notread = Laporan::where('status','menunggu')->count();

        return view('pages/superadmin/home_admin',[
            'today' => $today,
            'week' => $week,
            'month' => $month,
            'notread' => $notread,
        ]);
    }

    public function laporanforadmin() {
        $laporan = Laporan::select('tbl_laporan.*','users.name')
        ->join('users','users.id_users',$this->laporanxidusers)
        ->get();

        return view('pages/superadmin/laporan',[
            'laporan' => $laporan,
        ]);
    }

    public function index()
    {
        $user = Auth::user();

        
        if($user->role == 'warga') {
            $laporan = Laporan::select('tbl_laporan.*','users.name')
            ->join('users','users.id_users',$this->laporanxidusers)
            ->where($this->laporanxidusers,$user->id_users)
            ->get();

            return view('pages/warga/home_warga',[
                'laporan' => $laporan,
            ]);
        } else if($user->role == 'reviewer') {
            $today = Laporan::whereDate('created_at',Carbon::today())->count();
            $week = Laporan::where('created_at', '>', Carbon::now()->startOfWeek())
                ->where('created_at', '<', Carbon::now()->endOfWeek())
                ->count();
            $month = Laporan::whereMonth('created_at',Carbon::now()->month)
            ->whereYear('created_at',Carbon::now()->year)
            ->count();
            $notread = Laporan::where('status','menunggu')->count();

            $laporan = Laporan::select('tbl_laporan.*','users.name')
            ->join('users','users.id_users',$this->laporanxidusers)
            ->get();

            return view('pages/reviewer/home_reviewer',[
                'laporan' => $laporan,
                'today' => $today,
                'week' => $week,
                'month' => $month,
                'notread' => $notread,
            ]);
        }
    }

    public function cekdetail($id)
    {
        $laporan = Laporan::find($id);

        $proses = Proses::select('keterangan','tbl_proses.created_at')
        ->join('tbl_laporan','tbl_laporan.id','tbl_proses.id_laporan')
        ->where('tbl_proses.id_laporan',$laporan->id)
        ->orderBy('tbl_proses.created_at')
        ->get();

        $data = $proses;

        return json_encode($data);
    }

    public function respon(Request $request, $id)
    {
        $user = Auth::user();
        $respon = Laporan::findOrFail($id);

        $warga = User::where('id_users',$respon->id_users)->first();

        $module = "respon admin";
        $id_users = $user->id_users;
        $nama = $warga->name;

        $email = $warga->email;
        $text = "admin telah merespon laporan anda yang berjudul : ".$respon->judul;

        $respon->update([
            "status" => "direspon"
        ]);

        $mail = new GenerateMailController;
        $mail->generateMail($module,$id_users,$email,$nama,$text);

        return redirect()->route('admin.laporan')->with('status', "berhasil memberikan respon");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        
        $usercheck = User::where('id_users',$user->id_users)->first();
        // where('kode_kelurahan',$user->kode_kelurahan)->
        
        $checklaporan = Laporan::where('id_users',$user->id_users)->count();
 
        $module = "warga lapor";
        $getadmin = User::where('role','admin')->first();

        $file = $request->file('gambar');
        $nama_file = $module."_".time()."_".$file->getClientOriginalName();
        $tujuan_upload = 'upload';
        $file->move($tujuan_upload,$nama_file);
        
        $id_users = $user->id_users;
        $email = $getadmin->email;
        $nama = $getadmin->name;
        $text = "warga atas nama ".$user->name." telah mengirim laporan kepada anda, silahkan cek di sistem untuk melihat detailnya.";
        
        $data = [
            "id_users" => $user->id_users,
            "gambar" => $nama_file,
            "judul" => $request->judul,
            "lat" => $request->lat,
            "long" => $request->long,
            "laporan" => $request->laporan,
            "aksi" => "menunggu",
            "status" => "menunggu"
        ];

        if($usercheck->isValid == 0) {
            if($checklaporan < 1) {
                $laporan = Laporan::create($data);
            } else {
                return redirect()->route('warga.dashboard-warga.index')->with('status', "Akun Harus Di Verifikasi untuk Membuat Laporan Lebih Banyak!");
            }
        } else {
            $laporan = Laporan::create($data);
        }
        
        
        $mail = new GenerateMailController;
        $mail->generateMail($module,$id_users,$email,$nama,$text);
        
        return redirect()->route('warga.dashboard-warga.index')->with('status', "tambah laporan berhasil");
    }


    public function show($id) // untuk edit laporan warga
    {
        $laporan = Laporan::find($id);

        return view('pages/warga/edit_laporan',[
            'laporan' => $laporan,
            ]);
    }

    public function showforadmin($id)
    {
        $laporan = Laporan::find($id);

        $proses = Proses::join('tbl_laporan','tbl_laporan.id','tbl_proses.id_laporan')
        ->where('tbl_proses.id_laporan',$laporan->id)
        ->orderBy('tbl_proses.created_at')
        ->get();

        return view('pages/superadmin/edit_aksi',[
            'aksi' => $laporan,
            'proses' => $proses
            ]);
    }


    public function edit($id)
    {
        // * 404
    }

    public function update(Request $request, $id)
    {
        $laporan = Laporan::findOrFail($id);
        $laporan->update($request->all());

        return redirect()->route('warga.dashboard-warga.index')->with('status', "berhasil edit data");
    }

    public function updateaksi(Request $request,$id)
    {
        $user = Auth::user();

        $laporan = Laporan::findOrFail($id);
        $laporan->aksi = $request->aksi;
        $laporan->save();

        Proses::create([
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

        return redirect()->route('admin.laporan')->with('status', "berhasil edit data");

    }

    public function editpassword(Request $request, $id)
    {
        $user = Auth::user();

        $pass = $request->password;
        $warga = User::findorfail($id);
        
        $warga->password = bcrypt($pass);
        $warga->pass_txt = $pass;
        $warga->save();

        $module = "edit password";
        $id_users = $user->id_users;
        $email = $warga->email;
        $nama = $warga->name;
        $text = "password baru anda adalah ".$pass."";

        $mail = new GenerateMailController;
        $mail->generateMail($module,$id_users,$email,$nama,$text);

        return redirect()->route('home')->with('status','berhasil edit password');
    }

    public function destroy($id)
    {
        $user = Auth::user();

        $laporan = Laporan::findOrFail($id);
        $laporan->delete();

        if($user->role == 'admin') {
            $r = 'admin.laporan';
        } else {
            $r = 'warga.dashboard-warga.index';
        }

        return redirect()->route($r)->with('status','berhasil hapus');

    }

}
