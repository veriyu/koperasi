<?php

namespace App\Http\Controllers\{FolderController};

// call a model
use App\Models\{FolderModel}\{ModelName};

// Extend Controller
use App\Http\Controllers\Controller;

// Apply HTTP request (GET/POST)
use Illuminate\Http\Request;

use Illuminate\Pagination\LengthAwarePaginator;




class {ClassName}Controller extends Controller
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

        $this->data['rows']     = {ModelName}::getRows($param);

        // numbering
        $currentPage     = LengthAwarePaginator::resolveCurrentPage();
        
        if($currentPage == 1){
            $this->data['no']   = 1;
        }else{
            $this->data['no']   = (($currentPage - 1) * static::$perpage ) + 1;
        }
        // /numbering

        return view('{ViewDirectory}.index',$this->data);
    }

    public function create(Request $request){

        return view('{ViewDirectory}.form');
    }

    public function showdata(Request $request){


        return view('{ViewDirectory}.form_update');
    }

    public function save(Request $request){

        $data = $request->all();

        if($id == 'NULL'){
            
            {ModelName}::getInsert($data);
        }else{
            
            {ModelName}::getUpdate($data);
        }

        return redirect('{route}');

    }

    public function delete(Request $request){
        
        {ModelName}::getDelete($request->input('KegiatanId'));

        return redirect('{route}');
    }

}
