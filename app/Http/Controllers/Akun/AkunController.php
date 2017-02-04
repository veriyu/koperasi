<?php

namespace App\Http\Controllers\Akun;

// call a model
use App\Models\Akun\AkunModel;

// Extend Controllers
use App\Http\Controllers\Controller;

// Apply HTTP request (GET/POST)
use Illuminate\Http\Request;

use Illuminate\Pagination\LengthAwarePaginator;

// Use Encrypter
use App\Helpers\Encrypter;



class AkunController extends Controller
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

        $this->data['title']    = 'Akun';
        $this->data['module']   = 'Koperasi';
        
        $param = static::$perpage;

        $this->data['rows']     = AkunModel::paginate($param);
        // dd($this->data['rows']);
        // numbering
        $currentPage     = LengthAwarePaginator::resolveCurrentPage();
        
        if($currentPage == 1){
            $this->data['no']   = 1;
        }else{
            $this->data['no']   = (($currentPage - 1) * static::$perpage ) + 1;
        }
        // /numbering

        return view('Akun.index',$this->data);
    }

    public function create(Request $request){

        $this->data['title']    = 'Akun';
        $this->data['module']   = 'Koperasi';

        return view('Akun.form',$this->data);
    }

    public function showdata($id){

        $this->data['title']    = 'Akun';
        $this->data['module']   = 'Koperasi';

        $id = Encrypter::encryptID($id,true);
        
        $this->data['DataAkun'] = AkunModel::find($id);
        
        return view('Akun.form_update',$this->data);
    }

    public function save(Request $request){

        $this->validate($request, [
            'NoAkun'         => 'required',
            'NamaAkun'       => 'required',
            'KategoriAkun'       => 'required',
        ]);

        $Akun = new AkunModel;
        
        if($request->IdAkun == 'NULL'){
        
            $Akun->no_akun          = $request->NoAkun;
            $Akun->nama_akun        = $request->NamaAkun;
            $Akun->kategori_akun    = $request->KategoriAkun;

            $Akun->save();

        }else{
            $Akun = AkunModel::find($request->IdAkun);

            $Akun->no_akun          = $request->NoAkun;
            $Akun->nama_akun        = $request->NamaAkun;
            $Akun->kategori_akun    = $request->KategoriAkun;

            $Akun->save();
        }

        return redirect('akun');

    }

    public function delete(Request $request){
        
        AkunModel::find($request->id)->delete();

    }

}
