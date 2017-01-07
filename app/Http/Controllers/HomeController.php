<?php

namespace App\Http\Controllers;
use App\Models\HomeModel;
use Illuminate\Http\Request;
use Auth;
use Session;

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
    public function index(Request $request)
    {

        $this->data['TotalPasien']      = HomeModel::CountPasien();
        $this->data['TotalKegiatan']    = HomeModel::CountKegiatan();
        $this->data['BulanIni']         = HomeModel::BulanIni();
        $this->data['BulanLalu']        = HomeModel::BulanLalu();

        return view('home',$this->data);
    }
}
