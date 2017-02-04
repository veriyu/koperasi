<?php

namespace App\Http\Controllers\Laporan;

// call a model
use App\Models\Laporan\BukubesarModel;
use App\Models\Akun\AkunModel;

// Extend Controller
use App\Http\Controllers\Controller;

// Apply HTTP request (GET/POST)
use Illuminate\Http\Request;

use Illuminate\Pagination\LengthAwarePaginator;

// Use Encrypter
use App\Helpers\Encrypter;
use Session;

class BukubesarController extends Controller
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

        $this->data['title']    = 'Buku Besar';
        $this->data['module']   = 'Koperasi';
        
        $this->data['Bulan']    = array(
            '01'       => 'Januari',
            '02'       => 'Februari',
            '03'       => 'Maret',
            '04'       => 'April',
            '05'       => 'Mei',
            '06'       => 'Juni',
            '07'       => 'Juli',
            '08'       => 'Agustus',
            '09'       => 'September',
            '10'      => 'Oktober',
            '11'      => 'November',
            '12'      => 'Desember',
            );

        $this->data['Tahun'] = array(
            '2016'  => 2016,
            '2017'  => 2017,
            );

        $AkunModel = new AkunModel();

        $this->data['AkunList']   = $AkunModel->select('no_akun','nama_akun')->orderby('nama_akun','ASC')->get();

        return view('Laporan.Bukubesar.index',$this->data);
    }

    public function create(Request $request){
      
    }

    public function showdata(Request $request){

        $this->data['title']    = 'Buku Besar';
        $this->data['module']   = 'Koperasi';

        $this->data['Bulan']    = array(
            '01'       => 'Januari',
            '02'       => 'Februari',
            '03'       => 'Maret',
            '04'       => 'April',
            '05'       => 'Mei',
            '06'       => 'Juni',
            '07'       => 'Juli',
            '08'       => 'Agustus',
            '09'       => 'September',
            '10'      => 'Oktober',
            '11'      => 'November',
            '12'      => 'Desember',
            );

        $this->data['Tahun'] = array(
            '2016'  => 2016,
            '2017'  => 2017,
            );
        

        $data =  $request->all();
        
        $AkunModel = new AkunModel();

        if($request->NoAkun == null){
            
            $AkunList   = $AkunModel->select('no_akun','nama_akun')->get();


            foreach($AkunList as $akun){
                
                $DataDetail = BukubesarModel::getLaporanDetail($data,$akun->no_akun);
                
                $DataLaporan[] = array(
                    'NamaAkun'          => $akun->nama_akun,
                    'NoAkun'            => $akun->no_akun,
                    'Detail'            => $DataDetail,
                ); 
            }

            
        }else{
            $AkunList = $request->NoAkun;

            foreach($AkunList as $akun){
                
                $DataAkun = $AkunModel->select('no_akun','nama_akun')->where('no_akun',$akun)->first();

                $DataDetail = BukubesarModel::getLaporanDetail($data,$akun);
                
                $DataLaporan[] = array(
                    'NamaAkun'          => $DataAkun->nama_akun,
                    'NoAkun'            => $DataAkun->no_akun,
                    'Detail'            => $DataDetail,
                ); 
            }

        }

        $bln = ($request->Bulan == "Pilih Bulan" ? "" : $this->data['Bulan'][$request->Bulan]);
        
        $this->data['JudulBulan']    = $bln;
        $this->data['JudulTahun']    = $request->Tahun;

        $this->data['DataLaporan']  = $DataLaporan;
        $this->data['AkunList']     = $AkunModel->select('no_akun','nama_akun')->orderby('nama_akun','ASC')->get();

        return view('Laporan.Bukubesar.show',$this->data);
    }

    public function save(Request $request){

    }

    public function delete(Request $request){

    }

}
