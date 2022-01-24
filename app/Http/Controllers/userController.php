<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class userController extends Controller
{
    //

   public function create(){
       return view('create');
   }


   public function Register(Request $request){
       // code ....

     //    echo $request->name;
     //    echo $request->email;
     //    echo $request->input('name');
     //    dd( $request->all());
     //    dd($request->only(['name','email']));
     //    dd($request->except(['_token']));


      //   dd($request->has('image'));
       //  dd($request->hasAny(['phone','image']));
        // echo $request->method();
        // dd($request->isMethod('POST'));

        //    echo  $request->url();
        //  echo $request->ip();


        // if($request->method() == "POST"){

        //      $errors  = [];

        //      if(empty($request->name)){
        //          $errors['name'] = "Field Required";
        //      }


        //      if(empty($request->email)){
        //          $errors['email'] = "Field Required";
        //      }


        //      if(empty($request->password)){
        //          $errors['password'] = "Field Required";
        //      }

        //      if(count($errors) > 0 ){
        //          foreach ($errors as $key => $value) {
        //              # code...

        //              echo '*' . $key.': '. $value.'<br>';
        //          }
        //      }

        // }


         $this->validate($request,[
             "name"     => "required",
             "email"    => "required|email",
             "password" => "required|min:6|max:10",
         ]);



      //  session()->put('Message',"welcome to laravel");     //$_SESSION['KEY'] = "VALUE";
          session()->flash('Message',"welcome to laravel");
       return redirect(url('/User/Profile'));

   }




   public function profile(){

    $stdData = ["name" => "Root Account" , "Age" => 20 , "Level" => 3 ,"GPA" => 3.4 ];

    $Class = "A";

    //  return view('profile',["data" => $stdData , 'class' => $Class]);
    //  return view('profile')->with(["data" => $stdData , 'class' => $Class]);//->with('data',$stdData)->with('class',$Class);
        return view('profile',compact('stdData','Class'));

    }




}
