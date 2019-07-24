@extends('layouts/main')
@section('content')

   <div class="callout primary">
            <div class="row column">

              
              <h1>{{ $photos->title }}</h1>
              <p class="lead">{{ $photos->description }}</p>
              <p>Location:{{ $photos->location }} </p>
            </div>

            <a  href="/gallery/show/{{ $photos->gallery_id }}"><p class="button success" style="color: white;">Back to Portfolio</p></a> 

    </div>


    <div class="row small-up-2 medium-up-3 large-up-4">
      <div style="margin:auto;   ">
        
        <center><img width="60%"  src="/images/{{ $photos->image }}"></center> 

 <?php if (Auth::check()) : ?>
         <p style="text-align: center; margin-top: 40px;" >
           
           <a onclick="return confirm('Are you sure to delete?'); " class="button" href="/photo/destroy/{{ $photos->id }}/{{ $photos->gallery_id }}">Delete Portfoilio</a>

           <a class="button" href="/photo/edit/{{ $photos->id }}">Update Portfoilio</a>

 <?php endif ?>
         </p>

      

      </div>
     
      
     
    </div>
          
@stop