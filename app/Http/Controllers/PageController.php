<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;
use App\User;
// use App\Verification;
use Illuminate\Support\Facades\Input;
use Mail;

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

    public function contact(Request $request) {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required'
        ]);
          $name = Input::get('name');
          $email = Input::get('email');
          $msg = Input::get('message');
            
        $user = User:: where('type','0')->first();
        
        Mail::send('admin.contact', array('name' => $name,'email' => $email,'msg' => $msg), function($message) use($user) {
            $message->to($user->email, $user->name)->subject('Samarpan Contact');
        });
        
        return redirect('/')->with('contact_result', 'completed');

    }

    public function account() {
        return view('pages.account');
    }
}
