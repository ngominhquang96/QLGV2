<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\users;
use App\assignment;
use Illuminate\Support\Facades\DB;
use Validator;

class ProfileController extends Controller
{
    public function getProfile(){
   		if (Auth::check()) {
            $user = Auth::user();
            // $assigment = users::find($user->id)->MyAssignment();
            // foreach ($assigment as $ass) {
            //     echo $ass->timeDetail;
            // }
            //
            //$assignments = DB::table('assignment')->where('idUser',$user->id)->get();
            $assignments = assignment::where('idUser',$user->id)->get();
            //var_dump($assignments);
            // foreach ($assignments as $value) {
            //     echo $value->idUser;
            //     echo "</br>";
            //     echo $value->idCourse;
            //     echo "</br>";
            // }
            $index=1;
            return view('profile',['assignments'=>$assignments,'index'=>$index]);
        }
   	}
    public function getUpdate(){
        if (Auth::check()) {
            return view('update');
        }
    }
    public function postUpdate(Request $request){
        $rules = [
            'fullname'=> 'required|min:5',
            // 'password' => 'required|min:6|max:32',
            'phoneNumber'=>'required|min:10|max:10',
            // 'passwordAgain' => 'required|same:password'
        ];
        $messages= [
            'fullname.required'=> 'fullname la truong bat buoc',
            'fullname.min' => 'Name phai co it nhat 5 ki tu',    
            'password.required' =>' Password la truong bat buoc',
            // 'password.min' => 'Password phai co it nhat 6 ki tu',
            // 'password.max' => 'Password phai co nhieu nhat 32 ki tu',
            'phoneNumber.required' => 'phoneNumber la truong bat buoc',
            'phoneNumber.min' => 'phoneNumber phai co 10 ki tu',
            'phoneNumber.max' =>'phoneNumber phai co 10 ki tu',
            // 'passwordAgain.required' => ' Ban chua nhap lai mat khau',
            // 'passwordAgain.same' => 'Mat khau nhap lai chua khop'
        ];
        $validator = Validator::make($request->all(),$rules,$messages);
        if( $validator->fails()){
             return response()->json([
                    'error'=> true,
                    'message' => $validator->errors()
                ],200);    
        }else{
            if (Auth::check()) {
                $user = Auth::user();
                $user->password = bcrypt( $request->input('password'));
                $user->fullname = $request->input('fullname');
                $user->gender = $request->input('gender');
                $user->phoneNumber= $request->input('phoneNumber');
                $user->birthDay = $request->input('birth');
                $user->save();
                return response()->json([
                                'error'=> false,
                                'message' => 'success'
                            ],200);
            }else{
                die('vdr2');
                return response()->json([
                        'error' => 'Authentication :: Check that bai '
                    ],200);
            }
        }
    }
   	
    public function getLogout(){
      Auth::logout();
      return redirect('http://localhost/QLGV/public/login');
    }
}


