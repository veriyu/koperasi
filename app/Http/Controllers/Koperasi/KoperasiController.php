<?php

namespace App\Http\Controllers\Koperasi;

// call a model
use App\Models\Koperasi\KoperasiModel;

// Extend Controller
use App\Http\Controllers\Controller;

// Apply HTTP request (GET/POST)
use Illuminate\Http\Request;

use Illuminate\Pagination\LengthAwarePaginator;




class KoperasiController extends Controller
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

        $this->data['title']    = '';
        $this->data['module']   = '';
        
        $param = static::$perpage;

        $this->data['rows']     = KoperasiModel::getRows($param);

        // numbering
        $currentPage     = LengthAwarePaginator::resolveCurrentPage();
        
        if($currentPage == 1){
            $this->data['no']   = 1;
        }else{
            $this->data['no']   = (($currentPage - 1) * static::$perpage ) + 1;
        }
        // /numbering

        return view('Koperasi.index',$this->data);
    }

    public function create(Request $request){

        return view('Koperasi.form');
    }

    public function showdata(Request $request){


        return view('Koperasi.form_update');
    }

    public function save(Request $request){

        $data = $request->all();

        if($id == 'NULL'){
            
            KoperasiModel::getInsert($data);
        }else{
            
            KoperasiModel::getUpdate($data);
        }

        return redirect('koperasi');

    }

    public function delete(Request $request){
        
        KoperasiModel::getDelete($request->input('KegiatanId'));

        return redirect('koperasi');
    }

}
