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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/teacherpanel','TeacherIndex@TeacherIndex');
Route::get('dropdownlist','TeacherIndex@getsemester')->name('Addpaper');
Route::get('dropdownlist/getsubject/{id}','TeacherIndex@getsubject');
Route::post('/getvalue',array('uses'=>'TeacherIndex@postValue'))->name('getvalue');
Route::post('/question','TeacherIndex@store')->name('q');
Route::get('/deploy','DeployPaper@getsemester')->name('deploy');
Route::get('dropdownlist/getsubject/{id}','DeployPaper@getsubject');
Route::post('/deploy','DeployPaper@postValue')->name('deploy');
Route::post('/exam','HomeController@getExam')->name('exam');
Route::get('/Addsubject','HodController@Addsubject')->name('Addsubject');
Route::post('/postvalue','HodController@storesubject')->name('postvalue');
Route::get('/AddExam','HodController@Addexam')->name('AddExam');
Route::post('/hodpanel','HodController@storexam')->name('postExamvalue');
Route::get('viewpaper','TeacherIndex@viewpaper')->name('viewpaper');
Route::post('viewquestion','TeacherIndex@searchQuestion')->name('viewquestion');
Route::get('/checkpaper','Checkpaper@getsemester')->name('Checkpaper');
Route::get('dropdownlist/getsubject/{id}','Checkpaper@getsubject');
Route::post('/checkpaper','Checkpaper@getValue')->name('check');
Route::post('/saveanswer','HomeController@postanswer')->name('submitexam');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/login/custom',[
    'uses'=>'LoginController@login',
    'as' => 'login.custom'
]);

Route::group(['middleware'=>'auth'],function (){
    Route::get('/home',function (){
        return view('home');
    })->name('home');

    Route::get('/teacherpanel',function (){
        return view('teacher.index');
    })->name('teacherpanel');

    Route::get('/hodpanel',function (){
        return view('HOD.index');
    })->name('hodpanel');


});
