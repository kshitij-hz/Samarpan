<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use App\Verification;
use Illuminate\Support\Facades\Input;
use Mail;

class VerificationController extends Controller
{
	public function confirmation($id,$code){
		$confirmation = Verification::where('user_id',$id)->where('code',$code)->count();
		if($confirmation == 1){
			$user = User:: find($id);
			$user->verify = '1';
			$user->save();
			return redirect('/');
		}
		else{
			$user = User:: find($id);
			return view('admin.verification')->with('verify_mail_fail', $user->email);
		}
	}

	public function verification() {
		if(empty(session('verif_id')))
			die();
		$id = session('verif_id'); 
		$user = User::find($id);
		$code = md5($id.$user->email.time());
		$link = url('/confirmation/'.$id.'/'.$code);

		$check = new Verification();
		$check = Verification::where('user_id', $id)->count();
		if ($check==0) {
			$verification = new Verification();
			$verification->user_id = $user->id;
			$verification->code = $code;
			$verification->save();
		}
		else{
			$check = Verification::where('user_id', $id)->update(['code' => $code]);
		}
		// dd($_SERVER['SERVER_NAME']);
		Mail::send('admin.hello', array('name' => $user->name,'link' => $link), function($message) use($user) {
			$message->to($user->email, $user->name)->subject('Welcome!');
		});
		return view('admin.verification')->with('verify_mail', $user->email);
	}
}