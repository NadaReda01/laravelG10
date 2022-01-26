<?php

namespace App\Http\Controllers;
use App\Models\blog;
use Illuminate\Http\Request;

class blogController extends Controller
{




    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
         $data = blog::join('users','users.id','=','blogs.addedBy')->select('blogs.*','users.name as UserName')->get();

        // leftJoin     RightJoin
        //  "select blog.*,users.name from blog join users on users.id = blog.addedBy";

        return view('blog.index',['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data = $this->validate($request,[
            "title"   => "required|min:5",
            "content" => "required|min:100",
            "image"   => "required|image|mimes:png,jpg"
          ]);


         $FinalName = time().rand().'.'.$request->image->extension();

        if($request->image->move(public_path('images'),$FinalName)){


        $data['addedBy'] = auth()->user()->id;
        $data['image'] = $FinalName;

        $op =  blog::create($data);

       //  blog::create(['title' => $request->title , 'content' => $request->content , 'addedBy' => $request->addedBy] );

       if($op){
           $Message = "Raw Inserted";
       }else{
           $Message = "Error Try Again";
       }
    }else{
        $Message = "Error In Uploading Try Again ";
    }
        session()->flash('Message',$Message);

        return redirect(url('/Blog'));



    }






    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //


        dd('show method');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
       $data = blog::find($id);

       return view('blog.edit',['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $data = $this->validate($request,[
            "title"   => "required|min:5",
            "content" => "required|min:100",
            "image"   => "nullable|image|mimes:png,jpg"
          ]);

          # Fetch Raw Data ....
          $rawData = blog::find($id);


         if(request()->hasFile('image')){

            $FinalName = time().rand().'.'.$request->image->extension();

             if($request->image->move(public_path('images'),$FinalName)){

                   unlink(public_path('images/'.$rawData->image));

                }else{
                    $FinalName = $rawData->image;
                }

         }else{
             $FinalName = $rawData->image;
         }



         $data['image'] =  $FinalName;

         $op = blog::where('id',$id)->update($data);

         if($op){
             $message = "Raw Updated";
         }else{
             $message = "Error Try Again";
         }

         session()->flash('Message',$message);
        return redirect(url('/Blog'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
       $data = blog::find($id);

       $op = blog::find($id)->delete();    // where('id',$id)

       if($op){
           unlink(public_path('images/'.$data->image));
           $message = "Raw Removed";
       }else{
           $message = "Error Try Again";
       }

       session()->flash('Message',$message);
       return redirect(url('/Blog'));

    }



}
