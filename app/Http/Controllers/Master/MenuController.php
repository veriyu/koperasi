<?php

namespace App\Http\Controllers\Master;

// call a model
use App\Models\Master\MenuModel;

// Extend Controller
use App\Http\Controllers\Controller;

// Apply HTTP request (GET/POST)
use Illuminate\Http\Request;

use Illuminate\Pagination\LengthAwarePaginator;

use DB;



class MenuController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    static $module_name     = 'Sekolah';
    static $title           = 'Kelas';
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
        
        $MenuHeader     = MenuModel::getHeader();

        foreach($MenuHeader as $header){

            $Data[] = arrat(
                'Group'     => $header->Group,
                'Detail'    => MenuModel::getDetail($header->Group);
                ); 
        }
        $MenuDetail     = MenuModel::getRows($param);
        
        $this->data['rows']     = $Data;

        // numbering
        $currentPage     = LengthAwarePaginator::resolveCurrentPage();
        
        if($currentPage == 1){
            $this->data['no']   = 1;
        }else{
            $this->data['no']   = (($currentPage - 1) * static::$perpage ) + 1;
        }
        // /numbering

        return view('Master.Menu.index',$this->data);
    }

    public function create(Request $request){

        return view('Master.Menu.form');
    }

    public function showdata(Request $request){

        $this->data['DataKegiatan'] = MenuModel::getRow($request->input('KegiatanId'));
        $this->data['DataObat'] = MenuModel::getObat();

        return view('Poliklinik.Kegiatan.form_update',$this->data);
    }

    public function save(Request $request){

        $data = $request->all();

        if($request->input('ModuleId') == 'NULL'){
            // dd('satu');
            MenuModel::getInsert($data);
        }else{
            // dd('dua');
            MenuModel::getUpdate($data);
        }

        return redirect('module');

    }

    public function delete($id){
        
        MenuModel::getDelete($id);

        return redirect('module');
    }

    public function createMenu(){
        // dd('so');
        $NamaMenu       = 'Test';
        $Group          = 1;
        $Parent         = 1;
        $Child1         = 0;
        $Child2         = 0;

        self::GenerateMenu();
    }

    public function GenerateMenu(){

       $Menus = DB::table('menu')->get();
       $Groups = DB::table('menu')->select('group')->distinct('group')->get();
       print_r($Menus[0]->MenuId);die();

       $NewMenu = array();

       foreach ($Menus as $key =>$value) {
           print_r($value->MenuId);die();
       }
    }

}
