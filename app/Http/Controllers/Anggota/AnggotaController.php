<?php

namespace App\Http\Controllers\Anggota;

// call a model
use App\Models\Anggota\AnggotaModel;

// Extend Controller
use App\Http\Controllers\Controller;

// Apply HTTP request (GET/POST)
use Illuminate\Http\Request;

use Illuminate\Pagination\LengthAwarePaginator;

// Use Encrypter
use App\Helpers\Encrypter;



class AnggotaController extends Controller
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

        $this->data['title']    = 'Anggota';
        $this->data['module']   = 'Koperasi';
        
        $param = static::$perpage;

        $this->data['rows']     = AnggotaModel::getRows($param);

        // numbering
        $currentPage     = LengthAwarePaginator::resolveCurrentPage();
        
        if($currentPage == 1){
            $this->data['no']   = 1;
        }else{
            $this->data['no']   = (($currentPage - 1) * static::$perpage ) + 1;
        }
        // /numbering

        return view('Anggota.index',$this->data);
    }

    public function create(Request $request){

        return view('Anggota.form');
    }

    public function showdata($id){

        $id = Encrypter::encryptID($id,true);
        
        $this->data['DataAnggota'] = AnggotaModel::getRow($id);
        // dd($this->data['DataAnggota'] );
        return view('Anggota.form_update',$this->data);
    }

    public function save(Request $request){

        $data = $request->all();
        
        if($data['IdAnggota'] == 'NULL'){
            
            AnggotaModel::getInsert($data);
        }else{
            
            AnggotaModel::getUpdate($data);
        }

        return redirect('anggota');

    }

    public function delete(Request $request){

        AnggotaModel::getDelete($request->input('id'));

        return redirect('anggota');
    }

}
