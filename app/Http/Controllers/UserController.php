<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller AS BaseController;
use Illuminate\Routing\Redirector;

class UserController extends BaseController
{
   
	public function logout() {
		\Auth::logout();
		\Session::flush();

		// return Redirect::to('')->with('message', \SiteHelpers::alert('info','Your are now logged out!'));
		// return redirect()->route('login');
		return redirect()->back();
	}
}
