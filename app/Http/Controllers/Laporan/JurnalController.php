<?php

namespace App\Http\Controllers\Laporan;

// call a model
use App\Models\Laporan\JurnalModel;

// Extend Controller
use App\Http\Controllers\Controller;

// Apply HTTP request (GET/POST)
use Illuminate\Http\Request;

use Illuminate\Pagination\LengthAwarePaginator;

// Use Encrypter
use App\Helpers\Encrypter;
use Session;

class JurnalController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    static $perpage         = 20;

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

        $this->data['title']    = 'Setoran';
        $this->data['module']   = 'Koperasi';

        return view('Laporan.Jurnal.index',$this->data);
    }

    public function create(Request $request){
      
    }

    public function showdata(Request $request){

        $this->data['title']    = 'Setoran';
        $this->data['module']   = 'Koperasi';

        $ReportHeader = JurnalModel::getHeaderLaporan($request->input('TanggalAwal'),$request->input('TanggalAkhir'));
        
        $DataLaporan = array();
        
        foreach ($ReportHeader as $key => $value) {
            
            $Detail = JurnalModel::getDetailLaporan($value->id_transaksi);
            dd($Detail);
            $DataLaporan[] = array(
                'Tanggal'       => $value->tanggal,
                'Nama'          => 'name',
                'Keterangan'    => 'ket,',
                'Detail'        => $Detail,
            );
        }

        // dd($DataLaporan);
        $this->data['DataLaporan'] = $DataLaporan;  
        // dd($this->data['DataLaporan'][0]['Detail']);
        return view('Laporan.Jurnal.show',$this->data);
    }

    public function save(Request $request){

    }

    public function delete(Request $request){

    }

}
