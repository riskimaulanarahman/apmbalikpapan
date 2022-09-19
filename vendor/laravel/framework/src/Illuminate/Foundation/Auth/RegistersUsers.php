<?php

namespace Illuminate\Foundation\Auth;

use App\Model\Kecamatan;
use App\Model\Kelurahan;
use App\Model\RT; //rt

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;

trait RegistersUsers
{
    use RedirectsUsers;

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        $nort = RT::pluck('alamat','nomor_rt');
        // $kecamatan = Kecamatan::pluck('nama_kecamatan','kode_kecamatan');
        // $kelurahan = Kelurahan::pluck('nama_kelurahan','kode_kelurahan');

        return view('auth.register',[
            'nort' => $nort,
            // 'kecamatan' => $kecamatan,
            // 'kelurahan' => $kelurahan,
        ]);
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        $this->guard()->login($user);

        return $this->registered($request, $user)
                        ?: redirect($this->redirectPath());
    }

    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard();
    }

    /**
     * The user has been registered.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function registered(Request $request, $user)
    {
        //
    }
}
