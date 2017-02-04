<?php

namespace App\Http\Controllers\Tutupbuku;

// call a model
use App\Models\Tutupbuku\TutupbukuModel;
use App\Models\Akun\AkunModel;

// Extend Controller
use App\Http\Controllers\Controller;

// Apply HTTP request (GET/POST)
use Illuminate\Http\Request;

use Illuminate\Pagination\LengthAwarePaginator;

// Use Encrypter
use App\Helpers\Encrypter;
use Session;

class TutupbukuController extends Controller
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
    public function index()
    {

        $this->data['title']    = 'Tutup Buku';
        $this->data['module']   = 'Koperasi';

        $Akun = new AkunModel;

        $Tutupbuku = new TutupbukuModel;

        // Set Timezone to Asia Jakarta
        date_default_timezone_set('Asia/Jakarta');

        $DateNow    = date('Y-m-d');
        $Month      = date('m');
        $Year       = date('Y');
        $YearMonth  = date('Y-m');

        $Bulan    = array(
            '01'       => 'Januari',
            '02'       => 'Februari',
            '03'       => 'Maret',
            '04'       => 'April',
            '05'       => 'Mei',
            '06'       => 'Juni',
            '07'       => 'Juli',
            '08'       => 'Agustus',
            '09'       => 'September',
            '10'       => 'Oktober',
            '11'       => 'November',
            '12'       => 'Desember',
        );

        $SaldoAwal = $Tutupbuku->get();
        $YearMonth='2017-01';
        $DataSaldo = array();
        foreach ($SaldoAwal as $awal) {
            
            $SaldoBulanBerjalan = $Tutupbuku->Transaksi($YearMonth,$awal->no_akun);

            $Periode = "saldo_periode_".$Month."";
            
            switch ($Periode) {
                case 'saldo_periode_01':
                    # code...
                    if($awal->saldo_periode_01 >= 0 ){   
                        $nilai_d = $awal->saldo_awal;
                        $nilai_k = 0;
                    }else{
                        $nilai_d = 0;
                        $nilai_k = $awal->saldo_awal;
                    }
                    break;
                case 'saldo_periode_02':
                    # code...
                    if($awal->saldo_periode_02 >= 0 ){   
                        $nilai_d = $awal->saldo_periode_01;
                        $nilai_k = 0;
                    }else{
                        $nilai_d = 0;
                        $nilai_k = $awal->saldo_periode_01;
                    }
                    break;
                case 'saldo_periode_03':
                    # code...
                    if($awal->saldo_periode_03 >= 0 ){   
                        $nilai_d = $awal->saldo_periode_02;
                        $nilai_k = 0;
                    }else{
                        $nilai_d = 0;
                        $nilai_k = $awal->saldo_periode_02;
                    }
                    break;
                case 'saldo_periode_04':
                    # code...
                    if($awal->saldo_periode_04 >= 0 ){   
                        $nilai_d = $awal->saldo_periode_03;
                        $nilai_k = 0;
                    }else{
                        $nilai_d = 0;
                        $nilai_k = $awal->saldo_periode_03;
                    }
                    break;
                case 'saldo_periode_05':
                    # code...
                    if($awal->saldo_periode_05 >= 0 ){   
                        $nilai_d = $awal->saldo_periode_04;
                        $nilai_k = 0;
                    }else{
                        $nilai_d = 0;
                        $nilai_k = $awal->saldo_periode_04;
                    }
                    break;
                case 'saldo_periode_06':
                    # code...
                    if($awal->saldo_periode_06 >= 0 ){   
                        $nilai_d = $awal->saldo_periode_05;
                        $nilai_k = 0;
                    }else{
                        $nilai_d = 0;
                        $nilai_k = $awal->saldo_periode_05;
                    }
                    break;
                case 'saldo_periode_07':
                    # code...
                    if($awal->saldo_periode_07 >= 0 ){   
                        $nilai_d = $awal->saldo_periode_06;
                        $nilai_k = 0;
                    }else{
                        $nilai_d = 0;
                        $nilai_k = $awal->saldo_periode_06;
                    }
                    break;
                case 'saldo_periode_08':
                    # code...
                    if($awal->saldo_periode_08 >= 0 ){   
                        $nilai_d = $awal->saldo_periode_07;
                        $nilai_k = 0;
                    }else{
                        $nilai_d = 0;
                        $nilai_k = $awal->saldo_periode_07;
                    }
                    break;
                case 'saldo_periode_09':
                    # code...
                    if($awal->saldo_periode_09 >= 0 ){   
                        $nilai_d = $awal->saldo_periode_08;
                        $nilai_k = 0;
                    }else{
                        $nilai_d = 0;
                        $nilai_k = $awal->saldo_periode_08;
                    }
                    break;
                case 'saldo_periode_10':
                    # code...
                    if($awal->saldo_periode_10 >= 0 ){   
                        $nilai_d = $awal->saldo_periode_09;
                        $nilai_k = 0;
                    }else{
                        $nilai_d = 0;
                        $nilai_k = $awal->saldo_periode_09;
                    }
                    break;
                case 'saldo_periode_11':
                    # code...
                    if($awal->saldo_periode_11 >= 0 ){   
                        $nilai_d = $awal->saldo_periode_10;
                        $nilai_k = 0;
                    }else{
                        $nilai_d = 0;
                        $nilai_k = $awal->saldo_periode_10;
                    }
                    break;
                default:
                    # code...
                    if($awal->saldo_periode_12 >= 0 ){   
                        $nilai_d = $awal->saldo_periode_11;
                        $nilai_k = 0;
                    }else{
                        $nilai_d = 0;
                        $nilai_k = $awal->saldo_periode_11;
                    }
                    break;
            }

            $DataSaldo[] = array(
                'NoAkun'            => $awal->no_akun,
                'NamaAkun'          => $awal->nama_akun,
                'SaldoAwal_D'       => $nilai_d,
                'SaldoAwal_K'       => $nilai_k,
                'SaldoBerjalan_D'   => $SaldoBulanBerjalan->nilai_d,
                'SaldoBerjalan_K'   => $SaldoBulanBerjalan->nilai_k,
            );
        }

        // $Tutupbuku->sum('')
        $this->data['Status']       = '';
        $this->data['SaldoCoa']     = $DataSaldo;
        $this->data['Bulan']        = $Bulan[$Month];
        $this->data['Tahun']        = $Year;
        $this->data['Periode']      = $Month;

        return view('Tutupbuku.index',$this->data);
    }

    public function create(Request $request){
      
    }

    public function showdata(Request $request){

    }

    public function save(Request $request){
        
        $Tutupbuku = new TutupbukuModel;

        $DataUpdate = $Tutupbuku->where('tahun',$request->Tahun)->get();
        
        foreach ($DataUpdate as $update) {
            // Mengambil satu row yang akan di update dari table saldo akun
            $rowUpdate = $Tutupbuku->where('no_akun',$update->no_akun)->first();

            // Mengambil status tutup buku dari akun yang bersangkutan 
            $OldStatus = unserialize($update->status_tutup_buku);

            // Mendefinisikan status baru untuk periode yang sudah ditutup
            $NewStatus = array();
            foreach ($OldStatus as $key => $value) {
                if($key == $request->Periode){
                    $NewStatus[] = 1;
                }else{
                    $NewStatus[] = 0;
                }
            }
            
            $rowUpdate->tahun                  = $request->Tahun;
            $rowUpdate->status_tutup_buku      = serialize($NewStatus);

            $Periode = "saldo_periode_".$request->Periode."";
            
            switch ($Periode) {
                case 'saldo_periode_01':
                    # code...
                    $rowUpdate->saldo_periode_01 = $request->SaldoAkhir[$update->no_akun];
                    break;
                case 'saldo_periode_02':
                    # code...
                    $rowUpdate->saldo_periode_02 = $request->SaldoAkhir[$update->no_akun];
                    break;
                case 'saldo_periode_03':
                    # code...
                    $rowUpdate->saldo_periode_03 = $request->SaldoAkhir[$update->no_akun];
                    break;
                case 'saldo_periode_04':
                    # code...
                    $rowUpdate->saldo_periode_04 = $request->SaldoAkhir[$update->no_akun];
                    break;
                case 'saldo_periode_05':
                    # code...
                    $rowUpdate->saldo_periode_05 = $request->SaldoAkhir[$update->no_akun];
                    break;
                case 'saldo_periode_06':
                    # code...
                    $rowUpdate->saldo_periode_06 = $request->SaldoAkhir[$update->no_akun];
                    break;
                case 'saldo_periode_07':
                    # code...
                    $rowUpdate->saldo_periode_07 = $request->SaldoAkhir[$update->no_akun];
                    break;
                case 'saldo_periode_08':
                    # code...
                    $rowUpdate->saldo_periode_08 = $request->SaldoAkhir[$update->no_akun];
                    break;
                case 'saldo_periode_09':
                    # code...
                    $rowUpdate->saldo_periode_09 = $request->SaldoAkhir[$update->no_akun];
                    break;
                case 'saldo_periode_10':
                    # code...
                    $rowUpdate->saldo_periode_10 = $request->SaldoAkhir[$update->no_akun];
                    break;
                case 'saldo_periode_11':
                    # code...
                    $rowUpdate->saldo_periode_11 = $request->SaldoAkhir[$update->no_akun];
                    break;
                default:
                    # code...
                    $rowUpdate->saldo_periode_12 = $request->SaldoAkhir[$update->no_akun];
                    break;
            }

            $rowUpdate->save();

        }

        return redirect('tutupbuku');

    }

    public function delete(Request $request){

    }

}
