<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('role',[
   'middleware' => 'role: CARY',
   'uses' => 'TestController@insert',
]);

Route::get('/viewpost/{post_id}', 'ViewpostController@render');
Route::post('/viewpost/{post_id}', 'ViewpostController@comment');
Route::get('/deletepost/{post_id}', 'ViewpostController@delete');
Route::get('/deletecomment/{post_id}/{comment_id}', 'ViewpostController@delcomment');
Route::get('/newpost', 'NewpostController@newpost');
Route::post('/newpost', 'NewpostController@putpost');


//Route::get('/', function () {
//    return view('home');
//});

Route::get('/', function() {
    return redirect()->route('home');  
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/doneregister', function (){
    return view('message', ['message'=>"Successfully registered!"]);
});
