<?php

namespace App\Http\Controllers\Transaction;

// call a model
use App\Models\Transaction\SetoranModel;

// Extend Controller
use App\Http\Controllers\Controller;

// Apply HTTP request (GET/POST)
use Illuminate\Http\Request;

use Illuminate\Pagination\LengthAwarePaginator;

// Use Encrypter
use App\Helpers\Encrypter;
use Session;

class SetoranController extends Controller
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
        // dd(Session::all());
        $param = static::$perpage;

        $this->data['rows']     = SetoranModel::getRows($param);

        // numbering
        $currentPage     = LengthAwarePaginator::resolveCurrentPage();
        
        if($currentPage == 1){
            $this->data['no']   = 1;
        }else{
            $this->data['no']   = (($currentPage - 1) * static::$perpage ) + 1;
        }
        // /numbering

        return view('Transaction.Setoran.index',$this->data);
    }

    public function create(Request $request){

        $this->data['title']    = 'Setoran';
        $this->data['module']   = 'Koperasi';

        $this->data['DataAnggota'] = SetoranModel::getAnggota();

        return view('Transaction.Setoran.form',$this->data);
    }

    public function showdata($id){

        $this->data['title']    = 'Setoran';
        $this->data['module']   = 'Koperasi';

        $id = Encrypter::encryptID($id,true);
        
        $this->data['DataAnggota']          = SetoranModel::getAnggota();
        $this->data['DataSetoran']          = SetoranModel::getRow($id);

        $this->data['DataSetoranDetail']    = SetoranModel::getRowDetail($id);

        return view('Transaction.Setoran.form_update',$this->data);
    }

    public function save(Request $request){
        
        $this->validate($request, [
            'NoAnggota'         => 'required',
            'TanggalSetoran'    => 'required',
            'NoSum'             => 'required',
            'Keterangan'        => 'required',
        ]);

        $data = $request->all();
        
        if($data['IdTransaksi'] == 'NULL'){
            
            SetoranModel::getInsert($data);
        }else{
            
            SetoranModel::getUpdate($data);
        }

        return redirect('setoran');

    }

    public function delete(Request $request){

        SetoranModel::getDelete($request->input('id'));

        return redirect('setoran');
    }

    public function anggota(Request $request){
        // dd($request->input('NoAnggota'));
        $dataAnggota = SetoranModel::getDataAnggota($request->input('NoAnggota'));
        // dd($dataAnggota);
        return json_encode($dataAnggota);
    }

}
