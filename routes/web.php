<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;

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

// Route::get('test',function (){echo 'test data';});
// Route::get('Message/{name}/{id?}',function ($name,$id =null ){
//     echo 'Student id = '.$id.'  && NAME = '.$name;
// })->where('name','[a-zA-Z]+');


// Route::get('StudentInfo/{id}',function ($id){
//     echo 'Student Id = '.$id;
// });

//  .com?id=111     -    com/11
// Route::view('Register','create');

// Route::post('action',function (){
//     echo 'Form Action';
// });


// Route::get('Message',[userController::class,'Message']);    // ****

// Route::get('Message','userController@Message');

// Route::get('Register',function (){
//     return view('create');
// });

###########################################################################################
// User Routes ......
Route::get('User/Create',[userController::class,'create']);
Route::post('User/Register',[userController::class,'Register']);
Route::get('User/Profile',[userController::class,'profile']);



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





