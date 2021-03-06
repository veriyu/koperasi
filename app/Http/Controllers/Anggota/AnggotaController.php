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

        $this->data['title']    = 'Anggota';
        $this->data['module']   = 'Koperasi';

        $this->data['DataAnggota'] = AnggotaModel::getAnggota();

        return view('Anggota.form',$this->data);
    }

    public function showdata($id){

        $this->data['title']    = 'Anggota';
        $this->data['module']   = 'Koperasi';

        $this->data['Anggota'] = AnggotaModel::getAnggota();

        $id = Encrypter::encryptID($id,true);
        
        $this->data['DataAnggota'] = AnggotaModel::getRow($id);
        
        return view('Anggota.form_update',$this->data);
    }

    public function save(Request $request){

        $this->validate($request, [
            'NoAnggota'         => 'required',
            'NamaAnggota'       => 'required',
        ]);

        $data = $request->all();
        // dd($data);
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

    public function search(Request $request){

        $this->data['title']    = 'Anggota';
        $this->data['module']   = 'Koperasi';

        $data = $request->all();
        
        $params = array(
            'NoAnggota'     => $data['NoAnggota'],
            'NamaAnggota'   => $data['NamaAnggota'],
            'perPage'       => static::$perpage,
        );

        $this->data['rows']     = AnggotaModel::searchAnggota($params);

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

}
