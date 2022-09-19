<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->role == 'admin') {

            return redirect()->route('admin.dashboard-admin');

        } elseif(Auth::user()->role == 'reviewer') {
            return redirect()->route('reviewer.laporan.index');

            // return redirect()->route('rt.dashboard-rt.index');

        } elseif(Auth::user()->role == 'warga') {

            return redirect()->route('warga.dashboard-warga.index');
            
        }  else {
            return view('notyet');
        }
    }

}
