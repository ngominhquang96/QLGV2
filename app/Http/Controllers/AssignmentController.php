<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\assignment;
use Validator;

use Illuminate\Support\MessageBag;

class AssignmentController extends Controller
{
    public function getListAssignment(){
    	$assignment = $assignment->all();
    	return view('admin.assignment.list',['assignment'=>$assignment]);
    }
    public function getUpdateAssignment($id){

    }
    public function postUpdateAssignment(Request $request, $id){

    }
    public function getAddAssignment(){
    	return view('admin.assignment.add');
    }
    public function postAddAssignment(){

    }
}
