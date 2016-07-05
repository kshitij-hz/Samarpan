<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;

class PageController extends Controller
{
    public function __construct() {

    }

    public function index() {
    	if(Auth::guest())
    		return view('pages.home');
    	else {
    		$type = Auth::user()->type;
    		if($type == '0')
    			return view('admin.index');
    		else return redirect('profile');
    	}
    }

    public function about() {

    }

    public function account() {
        return view('pages.account');
    }
}
