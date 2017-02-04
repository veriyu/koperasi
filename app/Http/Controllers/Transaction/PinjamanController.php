<?php

namespace App\Http\Controllers\Transaction;

// call a model
use App\Models\Transaction\PinjamanModel;

// Extend Controller
use App\Http\Controllers\Controller;

// Apply HTTP request (GET/POST)
use Illuminate\Http\Request;

use Illuminate\Pagination\LengthAwarePaginator;

// Use Encrypter
use App\Helpers\Encrypter;
use Session;

class PinjamanController extends Controller
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

        $this->data['title']    = 'Pinjaman';
        $this->data['module']   = 'Koperasi';
        
        $param = static::$perpage;

        $this->data['rows']     = PinjamanModel::getRows($param);

        // numbering
        $currentPage     = LengthAwarePaginator::resolveCurrentPage();
        
        if($currentPage == 1){
            $this->data['no']   = 1;
        }else{
            $this->data['no']   = (($currentPage - 1) * static::$perpage ) + 1;
        }
        // /numbering

        return view('Transaction.Pinjaman.index',$this->data);
    }

    public function create(Request $request){

        $this->data['DataAnggota'] = PinjamanModel::getAnggota();

        return view('Transaction.Pinjaman.form',$this->data);
    }

    public function showdata($id){

        $id = Encrypter::encryptID($id,true);

        $this->data['DataAnggota']          = PinjamanModel::getAnggota();
        $this->data['DataSetoran']          = PinjamanModel::getRow($id);
        $this->data['DataSetoranDetail']    = PinjamanModel::getRowDetail($id);
        // dd($this->data['DataSetoranDetail']);

        return view('Transaction.Setoran.form_update',$this->data);
    }

    public function save(Request $request){

        $data = $request->all();
        
        if($data['IdPinjaman'] == 'NULL'){
            
            PinjamanModel::getInsert($data);
        }else{
            
            PinjamanModel::getUpdate($data);
        }

        return redirect('pinjaman');

    }

    public function delete(Request $request){

        SetoranModel::getDelete($request->input('id'));

        return redirect('pinjaman');
    }

}
