<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use DB;
use Auth;

class GalleryController extends Controller{
   

    private $table = 'galleries'; 

    //List Gallery
    public function index(){

        //Get All Cover photo .....
        $galleries = DB::table('galleries')->get();

        //Render the view...
    	return view('gallery/index', compact('galleries'));
    }

    //show create form

    public function create(){

        //Check Log in ....

        if (!Auth::check()) {

        //return \Redirect::route('gallery.index');

        return Redirect('/gallery'); 
            
        }

    	return view('gallery/create');
    }




    //store gallery

     public function store( Request $request){

        $name        = $request->input('name');
        $description = $request->input('description');
        $cover_image = $request->file('cover_image');
        $owner_id    = 1;

        //Check image....

        if ($cover_image) {
           
           $cover_image_filename = $cover_image->getClientOriginalName();
           $cover_image->move(public_path('images'), $cover_image_filename);
        }else{

            $cover_image_filename = 'noimage.jpg';
        }


        //Insert Gallery Iamge....
        DB::table('galleries')->insert(
            [
                'name' => $name,
                'description' => $description,
                'cover_image'  => $cover_image_filename,
                'owner_id'  =>  $owner_id
            ]
        );


        //set Message.....
        \Session::flash('message', 'Gallery Cover Created Successfully.');

        //Redirect........

       // return \Redirect::route('gallery.index'); ----- Not work------

       return  redirect('/');



    	
    }

    //Show gallery photo

     public function show($id){



        //Get Gallery....

        $gallery = DB::table('galleries')->where('id', $id)->first();

        //Get Photos...
    	
         $photos = DB::table('photos')->where('gallery_id', $id)->get();

         //Render the view...

        return view('gallery/show', compact('gallery', 'photos'));
    }
    

}
