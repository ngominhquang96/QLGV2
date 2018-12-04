<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\users;
use App\assignment;
use App\courses;
use Illuminate\Support\collection;

Route::get('login','LoginController@getLogin');
Route::post('login','LoginController@postLogin');
Route::get('profile','ProfileController@getProfile')->middleware('AuthMiddle')->name('profile');
Route::get('logout','ProfileController@getLogout');
Route::get('update','ProfileController@getUpdate')->middleware('AuthMiddle');
Route::post('update','ProfileController@postUpdate')->middleware('AuthMiddle');

Route::get('test',function(){
     $assignment = DB::table('assignment')->where('idUser', '5')->where('idCourse','1')->get();
     $ass = $assignment->first();
   // $ass = assignment::find([5,1]);

    //foreach ($assignment as $ass) {
    	//echo $value->idUser;
    	// $course = DB::table('courses')->where('id',$value->idCourse)->get();
    	// foreach ($course as $var) {
    	// 	echo $var->nameCourse;
    	// }
    	var_dump($ass);

    	
    	// echo $value->timeStart;
    	// echo $value->timeFinish;
    	// echo $value->timeDetail;
    	echo "</br>";

    //}
});

Route::group(['prefix'=>'admin','middleware'=>'AdminMiddle'], function(){
	
	Route::group(['prefix'=>'users'],function(){
		Route::get('list','UserManagementController@getListUser');

		Route::get('update/{id}','UserManagementController@getUpdateUser');
		Route::post('update/{id}','UserManagementController@postUpdateUser');

		Route::get('add','UserManagementController@getAddUser');
		Route::post('add','UserManagementController@postAddUser');
		Route::get('showinfo/{id}','UserManagementController@ShowInfoUser');
		Route::get('delete/{id}','UserManagementController@deleteUser');
		Route::post('search','UserManagementController@postSearchController');
	});

	Route::group(['prefix'=>'courses'],function(){
		Route::get('list','CourseManagementController@getListCourse');


		Route::get('update/{id}','CourseManagementController@getUpdateCourse');
		Route::post('update/{id}','CourseManagementController@postUpdateCourse');

		Route::get('add','CourseManagementController@getAddCourse');
		Route::post('add','CourseManagementController@postAddCourse');
		Route::get('delete/{id}','CourseManagementController@deleteCourse');
		Route::post('search','CourseManagementController@postSearchController');
	});

	Route::group(['prefix'=>'assignment'],function(){
		Route::get('list','AssignmentManagementController@getListAssignment');

		Route::get('update/{id}','AssignmentManagementController@getUpdateAssignment');
		Route::post('update/{id}','AssignmentManagementController@postUpdateAssignment');

		Route::get('add','AssignmentManagementController@getAddAssignment');
		Route::post('add','AssignmentManagementController@postAddAssignment');
		Route::get('delete/{id}','AssignmentManagementController@deleteAssignment');
		Route::post('search','AssignmentManagementController@postSearchController');
	});


});