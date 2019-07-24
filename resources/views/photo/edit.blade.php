@extends('layouts/main')
@section('content')

   <div class="callout primary">
            <div class="row column">
                <p><a href="/photo/details/{{ $photos->id }}">Back to Details</a></p>
              <h1>Update Portfolio Data </h1>
              <p class="lead">Update the Portfolio Photo </p>
            </div>
    </div>


    <div class="row small-up-2 medium-up-3 large-up-4">
    	
    	<div class="maindiv">
    		
    	   {!! Form::open(array('action' => 'PhotoController@updatedata', 'enctype' => 'multipart/form-data')) !!}

            <input type="hidden" name="id" value="{{ $photos->id }}">

         {!!  Form::label('title', 'Title')  !!}
         {!!  Form::text('title', $value = $value = $photos->title, $attributes = [ 'name' => 'title', 'required' => 'required' ])  !!}

         {!!  Form::label('description', 'Description')  !!}
         {!!  Form::text('description', $value = $photos->description, $attributes = [ 'name' => 'description', 'required' => 'required' ])  !!}
 

         {!!  Form::label('location', 'Location')  !!}
         {!!  Form::text('location', $value = $photos->location, $attributes = [ 'name' => 'location', 'required' => 'required' ])  !!}

         <div class="upnew" style="width: 50%; float: left; overflow: hidden;">
         {!!  Form::label('image', 'Portfolio Image')  !!}
         {!!  Form::file('image')  !!}
         </div>
         <div class="previmg" style="width: 50%; float: right; overflow: hidden;">
             
            <img width="220" height="120" src="/images/{{ $photos->image }}">
         </div>
         <input type="hidden" name="gallery_id" value="{{ $photos->gallery_id }}">


          {!!  Form::submit('Update', $attributes = ['class' => 'button'])  !!}



         {!! Form::close() !!}


    	</div>	

    </div>
          
@stop