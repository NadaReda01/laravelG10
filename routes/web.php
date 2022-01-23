<?php

use Illuminate\Support\Facades\Route;

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

Route::get('test',function (){echo 'test data';});
Route::get('Message/{name}/{id?}',function ($name,$id =null ){
    echo 'Student id = '.$id.'  && NAME = '.$name;
})->where('name','[a-zA-Z]+')->where('id','[0-9]+');

//  .com?id=111     -    com/11
// Route::view('Register','create');

// Route::get('Register',function (){
//     return view('create');
// });

/*
get
post
put
patch
delete
resource
option
match
any
view

*/





