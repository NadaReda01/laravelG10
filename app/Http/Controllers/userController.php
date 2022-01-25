<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Users;

class userController extends Controller
{
    //

    public function index(){

     if(auth()->check()){
     // code'
      $data =  Users::get();

      return view('User.index',['data' => $data]);

     }else{
         return redirect(url('/Login'));
     }

    }




    public function create(){
       return view('User.create');
   }


    public function store(Request $request){

     $data =    $this->validate($request,[
             "name"     => "required",
             "email"    => "required|email",
             "password" => "required|min:6|max:10",
         ]);



         $data['password'] = bcrypt($data['password']);

       $op =   Users::create($data);

       if($op){
           $Message = "Raw Inserted";
       }else{
           $Message = "Error Try Again";
       }

        session()->flash('Message',$Message);

        return redirect(url('/User'));

    }




    public function edit($id){
        // code .....
      $data =   Users::where('id',$id)->get();

      //    $data =   Users::find($id);  dd($data->name);

       return view('user.edit',['data' => $data]);
    }



    public function update(Request $request){
        // code .....

        $data =    $this->validate($request,[
             "name"     => "required",
             "email"    => "required|email",
             "id"       => "required|numeric"
         ]);

         $op =   Users::where('id',$data['id'])->update($data);

        if($op){
           $Message = "Raw Updated";
       }else{
           $Message = "Error Try Again";
       }

        session()->flash('Message',$Message);

        return redirect(url('/User'));
    }





    public function destroy($id){
        // code ....

       $op =   Users::where('id',$id)->delete();

       if($op){
           $Message = "Raw Removed";
       }else{
           $Message = "Error Try Again";
       }

        session()->flash('Message',$Message);

        return redirect(url('/User'));

    }





   public function login(){
       // code

       return view('User.login');
   }


   public function doLogin(Request $request){
       // code .....
       $data =    $this->validate($request,[
             "email"    => "required|email",
             "password" => "required|min:6|max:10",
         ]);



         if(auth()->attempt($data)){

           return redirect(url('/User'));

         }else{

            $message = "Error in Email || password try Again";
            session()->flash('Message',$message);
            return redirect(url('/Login'));
         }
   }




   public function logOut(){
       // code  .....
       auth()->logout();
       return redirect(url('/Login'));
   }





//    public function Register(Request $request){
//        // code ....

//      //    echo $request->name;
//      //    echo $request->email;
//      //    echo $request->input('name');
//      //    dd( $request->all());
//      //    dd($request->only(['name','email']));
//      //    dd($request->except(['_token']));


//       //   dd($request->has('image'));
//        //  dd($request->hasAny(['phone','image']));
//         // echo $request->method();
//         // dd($request->isMethod('POST'));

//         //    echo  $request->url();
//         //  echo $request->ip();


//         // if($request->method() == "POST"){

//         //      $errors  = [];

//         //      if(empty($request->name)){
//         //          $errors['name'] = "Field Required";
//         //      }


//         //      if(empty($request->email)){
//         //          $errors['email'] = "Field Required";
//         //      }


//         //      if(empty($request->password)){
//         //          $errors['password'] = "Field Required";
//         //      }

//         //      if(count($errors) > 0 ){
//         //          foreach ($errors as $key => $value) {
//         //              # code...

//         //              echo '*' . $key.': '. $value.'<br>';
//         //          }
//         //      }

//         // }


//          $this->validate($request,[
//              "name"     => "required",
//              "email"    => "required|email",
//              "password" => "required|min:6|max:10",
//          ]);



//       //  session()->put('Message',"welcome to laravel");     //$_SESSION['KEY'] = "VALUE";
//           session()->flash('Message',"welcome to laravel");
//        return redirect(url('/User/Profile'));

//    }




//    public function profile(){

//     $stdData = ["name" => "Root Account" , "Age" => 20 , "Level" => 3 ,"GPA" => 3.4 ];

//     $Class = "A";

//     //  return view('profile',["data" => $stdData , 'class' => $Class]);
//     //  return view('profile')->with(["data" => $stdData , 'class' => $Class]);//->with('data',$stdData)->with('class',$Class);
//         return view('profile',compact('stdData','Class'));

//     }




}
