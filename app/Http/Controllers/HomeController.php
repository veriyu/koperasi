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
        $this->data['TotalSetoran']     = HomeModel::getTotalSetoran();
        $this->data['LastSetoran']      = HomeModel::getLastSetoran();
        // dd($this->data['LastSetoran']);
        return view('home',$this->data);
        // return view('home');
    }
}
