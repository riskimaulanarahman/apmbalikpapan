<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $message = [
            'required' => 'Silahkan isi kolom :attribute',
            'min' => ':attribute harus 16 karakter',
            'email' => 'Alamat email tidak sesuai',
            'unique' => ':attribute sudah digunakan',
            'confirmed' => 'Password konfirmasi tidak sesuai'
        ];
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'nik' => 'required|min:16|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            // 'kecamatan' => 'required',
            // 'kelurahan' => 'required',
            // 'nomor_rt' => 'required',
        ], $message);
    }

    // protected function message()
    // {
    //     return [
    //         'nik.min' => 'tesstt'
    //     ];
    // }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'nik' => $data['nik'],
            'email' => $data['email'],
            'notelp' => $data['notelp'],
            // 'kode_kecamatan' => $data['kecamatan'],
            // 'kode_kelurahan' => $data['kelurahan'],
            // 'nomor_rt' => $data['nomor_rt'],
            'password' => bcrypt($data['password']),
            'pass_txt' => $data['password'],
            'role' => 'warga',
        ]);
    }
}
