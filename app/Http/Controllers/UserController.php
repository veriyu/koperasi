<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller AS BaseController;
use Illuminate\Routing\Redirector;

// call a model
use App\User;

// Extend Controller
use App\Http\Controllers\Controller;

// Apply HTTP request (GET/POST)
use Illuminate\Http\Request;

use Illuminate\Pagination\LengthAwarePaginator;

// Use Encrypter
use App\Helpers\Encrypter;
use Session;

class UserController extends BaseController
{
   	static $perpage         = 20;

   	public function index(){
   		$this->data['title']    = 'Setoran';
        $this->data['module']   = 'Koperasi';

        $param = static::$perpage;

        $this->data['rows']     = User::getRows($param);

         // numbering
        $currentPage     = LengthAwarePaginator::resolveCurrentPage();
        
        if($currentPage == 1){
            $this->data['no']   = 1;
        }else{
            $this->data['no']   = (($currentPage - 1) * static::$perpage ) + 1;
        }
        // /numbering
        
   		return view('User.index',$this->data);
   	}

    public function create(Request $request){

        // $this->data['DataAnggota'] = SetoranModel::getAnggota();
    	return view('User.form');
    }

    public function save(Request $request){

        $data = $request->all();
        // dd($data);
        if($data['IdUser'] == 'NULL'){
            
            User::getInsert($data);
        }else{
            
            User::getUpdate($data);
        }

        return redirect('user');

    }

	public function logout() {
		\Auth::logout();
		\Session::flush();
        // \Session::regenerate();

		// return Redirect::to('')->with('message', \SiteHelpers::alert('info','Your are now logged out!'));
		return redirect()->route('login');
		// return redirect()->back();
	}
}
