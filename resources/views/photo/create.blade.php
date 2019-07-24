@extends('layouts/main')
@section('content')

   <div class="callout primary">
            <div class="row column">
              <h1>Upload Portfolio </h1>
              <p class="lead">Upload the Portfolio Photo to Make Gallery</p>
            </div>
    </div>


    <div class="row small-up-2 medium-up-3 large-up-4">
    	
    	<div class="maindiv">
    		
    	   {!! Form::open(array('action' => 'PhotoController@store', 'enctype' => 'multipart/form-data')) !!}


         {!!  Form::label('title', 'Title')  !!}
         {!!  Form::text('title', $value = null, $attributes = ['placeholder' => 'Portfolio title', 'name' => 'title', 'required' => 'required' ])  !!}

         {!!  Form::label('description', 'Description')  !!}
         {!!  Form::text('description', $value = null, $attributes = ['placeholder' => 'Portfolio decription', 'name' => 'description', 'required' => 'required' ])  !!}


         {!!  Form::label('location', 'Location')  !!}
         {!!  Form::text('location', $value = null, $attributes = ['placeholder' => 'Location', 'name' => 'location', 'required' => 'required' ])  !!}


         {!!  Form::label('image', 'Portfolio Image')  !!}
         {!!  Form::file('image')  !!}

         <input type="hidden" name="gallery_id" value="{{  $gallery_id }}">


          {!!  Form::submit('Submit', $attributes = ['class' => 'button'])  !!}



         {!! Form::close() !!}


    	</div>	

    </div>
          
@stop