<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\GenerateMailController;

use App\Model\SA_MasterUser;


use Auth;

class DatawargartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        $warga = SA_MasterUser::with(['rt'])
        ->where('nomor_rt',$user->nomor_rt)
        ->where('role','warga')
        ->get();

        // return $warga;
        return view('pages/rt/data_warga',['warga' => $warga,'id_users'=>$user->id_users]);
    }

    public function resetpass($id) {
        $user = Auth::user();

        $pass = "balikpapan123";
        $warga = SA_MasterUser::findorfail($id);
        
        $warga->password = bcrypt($pass);
        $warga->pass_txt = $pass;
        $warga->save();

        $module = "reset password";
        $id_users = $user->id_users;
        $email = $warga->email;
        $nama = $warga->name;
        $text = "password baru anda adalah ".$pass.", silahkan ubah password ini di menu profile";

        $mail = new GenerateMailController;
        $mail->generateMail($module,$id_users,$email,$nama,$text);

        return redirect()->route('rt.data-warga.index')->with('status','berhasil reset password');
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
