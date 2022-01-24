

   <!DOCTYPE html>
   <html lang="en">
   <head>
       <meta charset="UTF-8">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <meta http-equiv="X-UA-Compatible" content="ie=edge">
       <title>Document</title>
   </head>
   <body>
    **Student Data**
<br>




    {!! 'Student Class : '.$Class.'<br>' !!}

    @foreach ($stdData as $key => $value)

       {!! '* '.$key.' : '.$value.'<br>' !!}
    @endforeach






    <?php


    //   echo  session()->get('Message');

        //   session()->forget('Message');
        //   dd(session()->has('Message'));
        //   session()->flush();


    //  echo 'Student Class : '.$Class.'<br>';

    //    foreach ($stdData as $key => $value) {
    //        # code...
    //        echo '* '.$key.' : '.$value.'<br>';
    //    }

    ?>








<?php

   // echo 'test Message';

?>


    {{-- {{   '<h1>test Message</h1>'  }} --}}

    {{-- {!!   '<h1>test Message</h1>'  !!} --}}



    <?php

    //    if($con){
    //        // code
    //    }else{

    //    }

   // $age = 22;
    ?>


    {{-- @if ($age == 20)

        {{ 'age = 20'}}
    @elseif($age > 20)
     {{ 'age > 20'}}
    @else

       {{ 'age < 20 ' }}

    @endif --}}


      {{-- @for ($i=0;$i<2;$i++)
          {{$i}}
      @endfor --}}



      {{-- @foreach ([1,2,3,4] as $key => $val )
          {{$val}}
      @endforeach --}}



      {{-- @empty()

      @endempty  --}}

      {{-- @isset()

      @endisset --}}

   </body>
   </html>
