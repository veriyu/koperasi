<?php

namespace App\Http\Controllers\Transaction;

// call a model
use App\Models\Transaction\PengeluaranModel;

// Extend Controller
use App\Http\Controllers\Controller;

// Apply HTTP request (GET/POST)
use Illuminate\Http\Request;

use Illuminate\Pagination\LengthAwarePaginator;

// Use Encrypter
use App\Helpers\Encrypter;
use Session;

class PengeluaranController extends Controller
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
        
        $param = static::$perpage;

        $this->data['rows']     = PengeluaranModel::getRows($param);

        // numbering
        $currentPage     = LengthAwarePaginator::resolveCurrentPage();
        
        if($currentPage == 1){
            $this->data['no']   = 1;
        }else{
            $this->data['no']   = (($currentPage - 1) * static::$perpage ) + 1;
        }
        // /numbering

        return view('Transaction.Pengeluaran.index',$this->data);
    }

    public function create(Request $request){

        $this->data['DataAnggota'] = PengeluaranModel::getAnggota();

        return view('Transaction.Pengeluaran.form',$this->data);
    }

    public function showdata($id){

        $id = Encrypter::encryptID($id,true);

        $this->data['DataAnggota']          = PengeluaranModel::getAnggota();
        $this->data['DataSetoran']          = PengeluaranModel::getRow($id);
        $this->data['DataSetoranDetail']    = PengeluaranModel::getRowDetail($id);
        // dd($this->data['DataSetoranDetail']);

        return view('Transaction.Setoran.form_update',$this->data);
    }

    public function save(Request $request){

        $data = $request->all();
        
        if($data['IdPengeluaran'] == 'NULL'){
            
            PengeluaranModel::getInsert($data);
        }else{
            
            PengeluaranModel::getUpdate($data);
        }

        return redirect('pengeluaran');

    }

    public function delete(Request $request){

        SetoranModel::getDelete($request->input('id'));

        return redirect('pengeluaran');
    }

}
