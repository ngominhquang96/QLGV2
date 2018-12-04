<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Support\MessageBag;
use App\Users;

class LoginController extends Controller
{
    public function getLogin(){
    	if (Auth::check()) {
    		return redirect('http://localhost/QLGV/public/profile');
    	}else{
    		return view('login');
    	}
    }
    public function postLogin(Request $request){
    	$pattern = [
            'email'=>'required|email',
            'password' => 'required|min:6'
        ];
        $messages= [
            'email.required' => 'Email la truong bat buoc',
            'email.email' => 'Email khong dung dinh dang',
            'password.required' => 'Password la truong bat buoc',
            'password.password' => 'Password phai co it nhat 6 ki tu'
        ];
        $validator = Validator::make($request->all(),$pattern,$messages);
        if ( $validator->fails()){
            return response()->json([
                    'error'=> true,
                    'message' => $validator->errors()
                ],200);
        }else{
        	
        	$email = $request->input('email');
            $password = $request->input('password');
            // $user = Users::find(1);
            // die($user->fullname);
            // die($password);
            if(Auth::attempt(['email' => $email, 'password' => $password]))
            {
                return response()->json([
                    'error'=> false,
                    'message' => 'success'
                ],200);
            }else{
            	//die('vdr2');
                $errors = new MessageBag(['errorlogin'=>'Email or Password incorrect']);
                return response()->json([
                    'error'=> true,
                    'message' => $errors,
                ],200);
            }
       	}
    }
}
