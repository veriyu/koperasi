<?php

namespace App\Http\Controllers\Laporan;

// call a model
use App\Models\Laporan\BukubesarModel;

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

        // $this->data['Bulan']    = array(
        //     'Januari'       => 'Januari',
        //     'Februari'      => 'Februari',
        //     'Maret'         => 'Maret',
        //     'April'         => 'April',
        //     'Mei'           => 'Mei',
        //     'Juni'          => 'Juni',
        //     'Juli'          => 'Juli',
        //     'Agustus'       => 'Agustus',
        //     'September'     => 'September',
        //     'Oktober'       => 'Oktober',
        //     'November'      => 'November',
        //     'Desember'      => 'Desember',
        //     );
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
        
        $DataLaporanHeader = BukubesarModel::getLaporanHeader($data);
        // dd($DataLaporanHeader);

        foreach($DataLaporanHeader as $header){
            $detail = BukubesarModel::getLaporanDetail($header->id_transaksi);

            $DataLaporan[] = array(
                'Tanggal'       => $header->tanggal,
                'Keterangan'    => $header->keterangan,
                'Detail'        => $detail,
            );
        }
        
        $this->data['DataLaporan'] = $DataLaporanHeader;  

        return view('Laporan.Bukubesar.show',$this->data);
    }

    public function save(Request $request){

    }

    public function delete(Request $request){

    }

}
