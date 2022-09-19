<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Model\SA_MasterUser;
use App\Model\RT;
use DB;
use Exception;


class SA_MasterUserController extends Controller
{
    public function index()
    {
        $user = SA_MasterUser::with('rt')->get();

        return view('pages/superadmin/user',['user' => $user]);
    }

    public function tambah()
    {
        $nort = RT::pluck('alamat','nomor_rt');

        return view('pages/superadmin/tambah_user',[
            'nort' => $nort,
        ]);
    }

    public function store(Request $request)
    {

            $request->validate([
                'name' => 'required',
                'nik' => 'required | unique:users',
                'email' => 'required | unique:users',
                'password' => 'required',
                'role' => 'required',
            ]);

            try{

                SA_MasterUser::create([
                    'name' => $request->name,
                    'nik' => $request->nik,
                    'email' => $request->email,
                    'password' => bcrypt($request->password),
                    'pass_txt' => $request->password,
                    'role' => $request->role,
                    'notelp' => $request->notelp,
                ]);

                $data = 'berhasil menambahkan';
 
            } catch (\Exception $e){
                $data = array("status"=>"error","message"=>$e->getMessage());

                return $data;
            }

        return redirect()->route('admin.sa-user-index')->with('status',$data);
    }

    public function edit($id)
    {
        $user = SA_MasterUser::findOrFail($id);
        return view('pages/superadmin/edit_user',['user' => $user]);
    }

    public function update(Request $request,$id)
    {
        $request->validate([
            'name' => 'required',
            'nik' => 'required',
            'email' => 'required',
            'role' => 'required',
        ]);


        $user = SA_MasterUser::findOrFail($id);
        $user->update([
            'name' => $request->name,
            'nik' => $request->nik,
            'email' => $request->email,
            'role' => $request->role,
            'isvalid' => $request->isvalid,
        ]);

        if(!empty($request->password)) {
            $user->password = bcrypt($request->password);
            $user->pass_txt = $request->password;
            $user->save();
        }

        return redirect()->route('admin.sa-user-index')->with('status','berhasil ubah data');
    }

    public function deleted($id)
    {

        $user = SA_MasterUser::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.sa-user-index');
    }
    
}
