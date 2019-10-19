<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\content;
use App\Http\Requests;
use App\User;
use Auth;
use DB;
use DateTime;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Input;
use Image;
use File;



class PagesController extends Controller
{
    public function books()
    {
        $books = content::where('subject', '=', 'books')
            ->get();

        return view('quotes.books', compact('books'));
    }

    public function movies()
    {
//        $movies = ['Into the wild', 'Pulp Fiction', 'Monsters Inc.'];
        $quotes = content::where('subject', '=', 'movies')
            ->get();
        
        Auth::user()->content = '';
        Auth::user()->avatar = '';
        Auth::user()->save();
        
        return view('quotes.movies', compact('quotes'));
    }

    public function all()
    {
        $quotes = content::all();
        return view('quotes.all', compact('quotes'));
    }

    public function show($id)
    {

        $content = content::find($id);
        return view('quotes.show', compact('content'));
    }

    public function profile()
    {
        return view('profile');
    }

    public function update(Request $request)
    {
        if (null != $request->input('name'))
            User::where('name', Auth::user()->name)->update(['name' => $request->name]);
        if (null != $request->input('email'))
            User::where('name', Auth::user()->name)->update(['email' => $request->email]);
        if (null != $request->input('address'))
            User::where('name', Auth::user()->name)->update(['address' => $request->address]);
            //Auth::user()->address = $request->input('address');

        return redirect('profile');
    }

    public function create(Request $request)
    {
        $id = Auth::user()->id;
        DB::table('contents')->insert(['author' => $request->author, 'quote' => $request->quote, 'created_at' => new DateTime, 'updated_at' => new DateTime, 'subject' => $request->subject, 'creator_id' => $id]);
        return redirect('movies');
    }

    public function change(Request $request)
    {

        if ($request->subject != null)
            content::where('quote', $request->quote)->update(['subject' => $request->subject]);

        if ($request->author != null)
            content::where('quote', $request->quote)->update(['author' => $request->author]);


        return redirect('movies');
    }

    public function delete(Request $request)
    {
        $model = content::where('id', '=', $request->quote)
            ->get()->first();

        if (Gate::allows('update-post', $model)) {
            $model->delete();
            return redirect('movies');
        } else
            return redirect('movies');

    }
    
    public function avatar(Request $request){
        //$img = Image::make($path);
        //$img->resize(250, null)->save();
        $image = $request->file('avatar');
        
        $filename = time() . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(250, 250)->insert(storage_path('app/public/watermark.png'), 'bottom-right', 10, 10)->save(storage_path('app/public/'.$filename));

        //$path = 'storage/'.$filename;
        Auth::user()->avatar = $filename;
        Auth::user()->save();
        return redirect('profile');
       
    }
    
    public function content_images(Request $request){
        $image = $request->file('content_image');
        //$name = Input::file('content_image')->getClientOriginalName();
        $filename = time() . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(250, 250)->insert(storage_path('app/public/watermark.png'), 'bottom-right', 10, 10)->save(storage_path('app/public/'.$filename));

        
        Auth::user()->content = $filename;
        Auth::user()->save();
        
        $fn = 'hover-'.$filename;
        //File::copy(storage_path('app/public/'.$filename),storage_path('app/public/'.$fn));
        $img = $request->file('content_image');
        Image::make($img)->resize(250, 250)->insert(storage_path('app/public/watermark.png'), 'bottom-right', 10, 10)->pixelate(12)->save(storage_path('app/public/'.$fn));
        //$img->pixelate(12);
        
        
        
        return redirect('movies');
            //->with('path',$path);
    }


    // API endpoint
    public function helloEndPoint($id) {
//        $model = User::where('id', '=', 1)
//            ->get()->first();
        $model = User::find($id);

        return $model;
    }
}

 







