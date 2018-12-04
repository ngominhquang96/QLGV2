<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\assignment;
use Validator;
use App\users;

use Illuminate\Support\MessageBag;

class AssignmentManagementController extends Controller
{
    public function getListAssignment(){
    	$assignment = assignment::all();
    	return view('admin.assignment.list',['assignment'=>$assignment]);
    }
    public function getUpdateAssignment($id){
    	$assignment = assignment::find($id);
    	return view('admin.assignment.update',['assignment'=>$assignment]);
    }
    public function postUpdateAssignment(Request $request, $id){
    	$rules = [
            'timeStart' => 'required|min:10|max:10',
            'timeFinish' => 'required|min:10|max:10',
            'timeDetail' => 'required|min:6|max:13',
            'classRoom' => 'required|min:5,max:13'
        ];
        $messages= [
            'timeStart.required'=>'timeStart la truong bat buoc',
            'timeStart.min'=>'timeStart phai co 10 ki tu',
            'timeStart.max'=>'timeStart phai co 10 ki tu',

            'timeFinish.required'=>'timeFinish la truong bat buoc',
            'timeFinish.min'=>'timeFinish phai co 10 ki tu',
            'timeFinish.max'=>'timeFinish phai co 10 ki tu',

            'timeDetail.required'=>'timeDetail la truong bat buoc',
            'timeDetail.min'=>'timeDetail co it nhat 6 ki tu',
            'timeDetail.max'=>'timeDetail co nhieu nhat 13 ki tu',

            'classRoom.required'=>'classRoom la truong bat buoc',
            'classRoom.min'=>'classRoom co it nhat 5 ki tu',
            'classRoom.max'=>'classRoom co nhieu nhat 13 ki tu', 
        ];
        $validator = Validator::make($request->all(),$rules,$messages);
        if( $validator->fails()){
            return response()->json([
                    'error'=> true,
                    'message' => $validator->errors(),
                ],200);    
        }else{
        	//die( $request->input('timeDetail'));
        	//return $request->input('timeDetail');
            $assignments = assignment::find($id);
            $assignment = $assignments->first();
            $assignment->timeStart = $request->input('timeStart');
            $assignment->timeFinish = $request->input('timeFinish');
            $assignment->timeDetail = $request->input('timeDetail');
            $assignment->classRoom = $request->input('classRoom');
            //die($assignment->classRoom);

           	$assignment->save();
           	//die('vdr');
            return response()->json([
                'error'=> false,
                'message' => 'success'
                ],200);

        }

    }
    public function getAddAssignment(){
    	return view('admin.assignment.add');
    }
    public function postAddAssignment(Request $request){
        $rules = [
            'timeDetail' => 'required|min:6|max:13',
            'classRoom' => 'required|min:5,max:13'
        ];
        $messages= [
            'timeDetail.required'=>'timeDetail la truong bat buoc',
            'timeDetail.min'=>'timeDetail co it nhat 6 ki tu',
            'timeDetail.max'=>'timeDetail co nhieu nhat 13 ki tu',

            'classRoom.required'=>'classRoom la truong bat buoc',
            'classRoom.min'=>'classRoom co it nhat 5 ki tu',
            'classRoom.max'=>'classRoom co nhieu nhat 13 ki tu', 
        ];
        $validator = Validator::make($request->all(),$rules,$messages);
        if( $validator->fails()){
            return response()->json([
                    'error'=> true,
                    'message' => $validator->errors(),
                ],200);    
        }else{
            $idUser = $request->input('idUser');
            $idCourse = $request->input('idCourse');
            $assignment = assignment::where('idUser',$idUser)->where('idCourse',$idCourse)->get()->toArray();
            if ($assignment == null) {
                $assignment = new assignment();
                $assignment->idUser = $request->input('idUser');
                $assignment->idCourse = $request->input('idCourse');
                $assignment->timeStart = $request->input('timeStart');
                $assignment->timeFinish = $request->input('timeFinish');
                $assignment->timeDetail = $request->input('timeDetail');
                $assignment->classRoom = $request->input('classRoom');
                $assignment->save();
                $success = new MessageBag(['success'=>'Assignment successfully created']);
                return response()->json([
                                'error'=> false,
                                'message' => $success,
                            ],200);
            }else {
                $errors = new MessageBag(['errorcreateAssignment'=>'This assignment is already create']);
                return response()->json([
                                'error'=> true,
                                'message' => $errors,
                            ],200);
            }

        }
    }
    public function deleteAssignment($id){
        $ass = assignment::find($id);
        $ass->delete();
        return redirect('admin/assignment/list')->with('notification','Delete Assignment Success');
    }

    public function  postSearchController(Request $request){
        $users = users::where('fullname','LIKE','%'.$request->input('nameUser').'%')->get();
        $user = $users->first();
        $assignment = null;
        if ($user!= null) {
            $assignment = assignment::where('idUser',$user->id)->get();
        }
        return view('admin.assignment.resultSearch',['assignment'=>$assignment]);
    }
}
