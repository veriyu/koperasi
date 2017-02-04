<?php

namespace App\Http\Controllers\Laporan;

// call a model
use App\Models\Laporan\SaldoakunModel;

// Extend Controller
use App\Http\Controllers\Controller;

// Apply HTTP request (GET/POST)
use Illuminate\Http\Request;

use Illuminate\Pagination\LengthAwarePaginator;

// Use Encrypter
use App\Helpers\Encrypter;
use Session;

class SaldoakunController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    static $perpage         = 20;

    public function __construct()
    {
        // $this->middleware('auth');

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $this->data['title']    = 'Saldo Akun';
        $this->data['module']   = 'Koperasi';

       
        $this->data['Tahun'] = array(
            '2016'  => 2016,
            '2017'  => 2017,
        );

        return view('Laporan.SaldoAkun.index',$this->data);
    }

    public function create(Request $request){
      
    }

    public function showdata(Request $request){

        $this->data['title']    = 'Saldo Akun';
        $this->data['module']   = 'Koperasi';
         // $uri = $request->path();
        // dd($uri);
        $SaldoAkun  = new SaldoakunModel;

        $this->data['SaldoAkun']    = $SaldoAkun->where('tahun',$request->Tahun)->get();
        $this->data['Tahun']        = $request->Tahun;

        return view('Laporan.SaldoAkun.view',$this->data);
    }

    public function save(Request $request){
        

        return redirect('tutupbuku');

    }

    public function delete(Request $request){

    }

}
