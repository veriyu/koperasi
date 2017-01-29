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
        $this->data['TotalSetoran']         = HomeModel::getTotalSetoran();
        $this->data['LastSetoran']          = HomeModel::getLastSetoran();
        $this->data['TotalPengeluaran']     = HomeModel::getTotalPengeluaran();
        $this->data['LastPengeluaran']      = HomeModel::getLastPengeluaran();

        $this->data['TotalAnggota']         = HomeModel::getTotalAnggota();
        $this->data['AnggotaAktif']         = HomeModel::getAnggotaAktif();
        $this->data['AnggotaNonAktif']      = HomeModel::getAnggotaNonAktif();
        
        return view('home',$this->data);
    }
}
