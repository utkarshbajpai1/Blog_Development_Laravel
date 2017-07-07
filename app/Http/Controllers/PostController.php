<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Session;
use Image;
use Storage;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth'); 
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::paginate(5);

        return view('posts.index')->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request , array(
            'title' => 'required|max:255',
            'slug' => 'required|alpha_dash|max:255|unique:posts,slug',
            'body' => 'required',
            'featured_image' => 'sometimes|image',


            ));

        $post = new Post;
        $post->title = $request->title;
        $post->body = $request->body;
        $post->slug = $request->slug;

        if($request->hasFile('featured_image')){

                $image = $request->file('featured_image');
                $filename = time() . $image->getClientOriginalExtension();
                $location = public_path('images/' . $filename);
                Image::make($image)->resize(400 , 400)->save($location);

                $post->image = $filename;
        }

        $post->save();

        Session::flash('success','The blog post has been successfully saved!!');

        return redirect()->route('posts.show' , $post->id); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show')->withPost($post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);

        return view('posts.edit')->withPost($post);
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

        $post = Post::find($id);

/*
        if($request->input('slug') == $post->slug)  // checking whether the slug is unique
        {

            $this->validate($request , array(
            'title' => 'required|max:255',
            'body' => 'required'
            ));

        } else{
              }  
*/
            $this->validate($request , array(
            'title' => 'required|max:255',
            'slug' => "required|alpha_dash|min:5|max:255|unique:posts,slug,$id",
            'body' => 'required',
            'featured_image' => 'image'
            ));
      
        
        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->slug = $request->input('slug');
        $post->body = $request->input('body');

        if($request->hasFile('featured_image')){

                $image = $request->file('featured_image');
                $filename = time() . $image->getClientOriginalExtension();
                $location = public_path('images/' . $filename);
                Image::make($image)->resize(400 , 400)->save($location);
                $oldFilename = $post->image;

                //update
                $post->image = $filename;
                //delete the oldFile
                Storage::delete($oldFilename);
        }


        $post->save();

        Session::flash('success','The blog post has been successfully saved!!');

        return redirect()->route('posts.show' , $post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);

        $post -> delete(); 

        Session::flash('success','The blog post has been successfully deleted!!');

        return redirect()->route('posts.index');
    }
}
