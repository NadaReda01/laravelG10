<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\admin;

class adminController extends Controller
{
    //

    public function index(){

        dd('admin index ');

    }











   public function login(){
       // code

       return view('admin.login');
   }


   public function doLogin(Request $request){
       // code .....
       $data =    $this->validate($request,[
             "email"    => "required|email",
             "password" => "required|min:6|max:10",
         ]);



         if(auth('admin')->attempt($data)){     // auth()->guard('admin')

          //  return redirect(url('/User'));


      //    auth('admin')->user()->id
      dd('admin login');

         }else{

            $message = "Error in Email || password try Again";
            session()->flash('Message',$message);
            return redirect(url('/AdminLogin'));
         }
   }




   public function logOut(){
       // code  .....
       auth('admin')->logout();
       return redirect(url('/AdminLogin'));
   }





}
