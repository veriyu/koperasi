<?php

namespace App\Http\Controllers\Master;

// call a model
use App\Models\Master\ModuleModel;

// Extend Controller
use App\Http\Controllers\Controller;

// Apply HTTP request (GET/POST)
use Illuminate\Http\Request;

use Illuminate\Pagination\LengthAwarePaginator;

// Use Encrypter
use App\Helpers\Encrypter;

use DB;



class ModuleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    static $module_name     = 'Module Master';
    static $title           = 'ModuleCreator';
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

        $this->data['title']    = static::$title;
        $this->data['module']   = static::$module_name;

        $param = static::$perpage;

        $this->data['rows']     = ModuleModel::getRows($param);

        // numbering
        $currentPage     = LengthAwarePaginator::resolveCurrentPage();
        
        if($currentPage == 1){
            $this->data['no']   = 1;
        }else{
            $this->data['no']   = (($currentPage - 1) * static::$perpage ) + 1;
        }
        // /numbering

        return view('Master.Module.index',$this->data);
    }

    public function create(Request $request){

        return view('Master.Module.form');
    }

    public function showdata($id){

        $id = Encrypter::encryptID($id,true);

        $this->data['DataKegiatan'] = ModuleModel::getRow($id);

        return view('Poliklinik.Kegiatan.form_update',$this->data);
    }

    public function save(Request $request){

        $data = $request->all();

        if($request->input('ModuleId') == 'NULL'){
            // dd('satu');
            ModuleModel::getInsert($data);
        }else{
            // dd('dua');
            ModuleModel::getUpdate($data);
        }

        return redirect('module');

    }

    // public function delete($id){
    public function delete(Request $request){
        dd($request->all());
        // print($id);
        // ModuleModel::getDelete($id);

        // return redirect('module');
    }




}
