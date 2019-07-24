<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use DB;
use Auth;

class PhotoController extends Controller
{
    
   
    //show photo create form photoController

    public function create($gallery_id){

        if (!Auth::check()) {
        //return \Redirect::route('gallery.index');

        return Redirect('/gallery');     
        }

        //Render view
    	return view('photo/create', compact('gallery_id'));
    }


    //store photo

     public function store( Request $request){

        $gallery_id = $request->input('gallery_id');
        $title        = $request->input('title');
        $description = $request->input('description');
        $location = $request->input('location');
        $image = $request->file('image');
        $owner_id    = 1;


        if ($image) {
           
           $image_filename = $image->getClientOriginalName();
           $image->move(public_path('images'), $image_filename);
        }else{

            $image_filename = 'noimage.jpg';
        }


        DB::table('photos')->insert(

            [   
                'gallery_id' =>  $gallery_id,
                'title' => $title,
                'description' => $description,
                'location' => $location,
                'image'  => $image_filename,
                'owner_id'  =>  $owner_id


            ]
        );

       

        \Session::flash('message', 'Photo Gallery Upload Successfully.');

       return Redirect::route('galary.show', array('id' => $gallery_id)));
      
    	
    }

    //Show protfolio photo details

     public function details($id){


        $photos = DB::table('photos')->where('id', $id)->first();

         //Render the view...

        return view('photo/details', compact('photos'));
    }


    public function delete($id, $gallery_id){


        $photos = DB::table('photos')->where('id', $id)->delete();

       return Redirect::route('galary.show', array('id' =>$galary_id));

    }


    public function edit($id){

        //Check Log in ....
        if (!Auth::check()) {
        //return \Redirect::route('gallery.index');
        return Redirect('/gallery');
            
             }

        $photos = DB::table('photos')->where('id', $id)->first();

         return view('photo/edit', compact('photos'));


    }


    //update data....


     public function updatedata(Request $request){

        $id = $request->input('id');
        $gallery_id = $request->input('gallery_id');
        $title        = $request->input('title');
        $description = $request->input('description');
        $location = $request->input('location');
        $image = $request->file('image');
        $owner_id    = 1;


        if ($image) {
           
           $image_filename = $image->getClientOriginalName();
           $image->move(public_path('images'), $image_filename);

            DB::table('photos')->where('id', $id)->update(

            [   
                
                'title' => $title,
                'description' => $description,
                'location' => $location,
                'image'  => $image_filename,
                'owner_id'  =>  $owner_id
            ]
        );
             

        }else{

            DB::table('photos')->where('id', $id)->update(
            [      
                'title' => $title,
                'description' => $description,
                'location' => $location,
                'owner_id'  =>  $owner_id
            ]);    
        }

         return Redirect('/');
        \Session::flash('message', 'Portfolio updated Successfully.');
         
       



     }
}
