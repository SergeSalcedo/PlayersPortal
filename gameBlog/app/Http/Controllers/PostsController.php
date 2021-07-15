<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Post;

class PostsController extends Controller
{   

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]); // only a authenticated user can access it
    } //this is for the authentication.. to block everything in the dashboard is going to be blocked if the user is not authenticated

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() //it shows all the post from the database and orders them by newest at the top (desc)
    {   
        $posts = Post::orderBy('created_at', 'desc')->paginate(10); //for the paginate if the post more than 10 there should be a number below in the post to click for the next page
        return view('posts.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() // 
    {
        return view('posts.create'); //showing the webpage called create in the post file
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) // create new post
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'cover_image' => 'image|nullable|max:1999'
        ]);

        //Handling file uploads
        if($request->hasFile('cover_image')){
            //Get File Name+Extension
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            //Get just File Name
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get just file extension
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            //File name to store and creates unique id
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //upload img
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
        }
        else{
            $fileNameToStore = 'noimage.jpg';
        }

        //create a new post
        $post = new Post;
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->user_id = auth()->user()->id;
        $post->cover_image = $fileNameToStore;
        $post->save();

        return redirect('/posts')->with('success', 'Successfully created Post!');
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
        return view('posts.show')->with('post', $post);
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
        //checking for correct user
        if(auth()->user()->id !== $post->user_id){ //this code is to prevent the users to edit the other users post
            return redirect('/posts')->with('error', 'Please Login or Register first - Unauthorized account!');
        }

        return view('posts.edit')->with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) //editing a post
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required'
        ]);

        if($request->hasFile('cover_image')){
            //Get File Name+Extension
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            //Get just File Name
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get just file extension
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            //File name to store and creates unique id
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //upload img
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
        }

        //create a new post
        $post =  Post::find($id);
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        //Overwrites old image if the user updates it so the storage folder does not get filled
        if($request->hasFile('cover_image')){
            if($post->cover_image!='noimage.jpg'){
                Storage::delete('public/cover_images/'.$post->cover_image);
            }
            $post->cover_image=$fileNameToStore;
        }
        $post->save();

        return redirect('/posts')->with('success', 'Post Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) // delete a post
    {   
        $post = Post::find($id);
        //checking for user
        if(auth()->user()->id !== $post->user_id){
            return redirect('/posts')->with('error', 'Please Login or Register first - Unauthorized account!');
        }

        if($post->cover_image != 'noimage.jpg'){
            //Delete image
            Storage::delete('public/cover_images/'.$post->cover_image);
        }

        $post->delete();
        return redirect('/posts')->with('success', 'Post removed successfully!');
    }
}
