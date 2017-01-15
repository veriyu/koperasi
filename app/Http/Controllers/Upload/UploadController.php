<?php

namespace App\Http\Controllers\Upload;

// call a model
use App\Models\Upload\UploadModel;

// Extend Controller
use App\Http\Controllers\Controller;

// Apply HTTP request (GET/POST)
use Illuminate\Http\Request;

use Illuminate\Pagination\LengthAwarePaginator;

use Input;
use DB;
use Excel;


class UploadController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    static $module_name     = 'Unggah';
    static $title           = 'Berkas';
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

        $this->data['tableName'] = UploadModel::tableName();
        
        return view('Upload.index',$this->data);
    }

    public function upload(Request $request){

        // dd($request->all());

        $table_import = $request->input('Table');
        // dd($table_import);
        $file1 = $_FILES['FileUpload1']['tmp_name'];

        Excel::load($file1, function($reader) use($table_import){

            $data = $reader->noHeading();
            $results = $data->get();
            // dd($results);
            $row = 1;
            foreach($results as $detail) {
                
                $record = $detail->toArray();
                if($row > 2) {
                // dd($record);
                    UploadModel::insertDataExcel($record, $table_import);
                }

                $row++;
            }

        }); 
        // dd('stop');

        return redirect('upload');
    }

   
}
