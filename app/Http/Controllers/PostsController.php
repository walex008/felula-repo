<?php

namespace App\Http\Controllers;

use App\Http\Requests\post\CreatePostRequest;
use App\Http\Requests\post\UpdatePostsRequest;
use App\Imports\PostsImport;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        //This is to verify if a category exists before creating post
        $this->middleware(['VerifyCategoryExist'])->only('create', 'store');
    }

    public function index()
    {
        return view('posts.index')->with('posts', Post::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create')->with('categories', Category::all())->with('tags', Tag::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostRequest $request)
    {
        //store image
        $image = $request->image->store('posts', 'public');
//        dd($request->all());
        //store form details
//        ddd($request->all());
        $post = Post::create([
            'title'=> $request->title,
            'description'=> $request->description,
            'content'=> $request->content,
            'image'=> $image,
            'published_at' => $request->published_at,
            'category_id' => $request->category_id,
            'user_id'=> auth()->user()->id,
        ]);

        if ($request->tags){
            $post->tags()->attach($request->tags);
        }

        //flash message
        session()->flash('success', 'Post created successfully!');

        //redirect
        return redirect(route('posts.index'));
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('posts.create')->with('post', $post)->with('categories', Category::all())->with('tags', Tag::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostsRequest $request, Post $post)
    {
        $data = $request->only(['title', 'description', 'content', 'published_at', 'category_id']);

        //check if image is uploaded
        if($request->hasFile('image')){
            //upload new one
            $image = $request->image->store('posts', 'public');

            //delete old image
            $post->deleteImage();
            //Storage::delete($post->image);
            //save the new uploaded image
            $data['image'] = $image;
        }

        if ($request->tags){

            $post->tags()->sync($request->tags);
        }

        $post->update($data);

        //flash message
        session()->flash('success', 'Post updated successfully');

        //return redirect

        return redirect(route('posts.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Get the exact post to thrash
        $post = Post::withTrashed()->where('id', $id)->firstOrFail();

        //If the post has been trashed already, force delete it.
        if($post->trashed()){
            $post->deleteImage();
            $post->forceDelete();
        }else{
            //Trash post
            $post->delete();
        }

        session()->flash('success', 'Post trashed successfully');

        return redirect(route('posts.index'));
    }

    /**
     * Display list of trashed posts.
     *
     * @return \Illuminate\Http\Response
     */
    public function trashed(){

        //fetch all posts with trashed
        $trashed = Post::onlyTrashed()->get();

        //return view
        return view('posts.index')->with('posts', $trashed);
    }

    /**
     * Restore thrashed posts.
     *
     * @return \Illuminate\Http\Response
     */
    public function restore($id){

        $post = Post::withTrashed()->where('id', $id)->firstOrFail();

        $post->restore();

        session()->flash('success', 'Post restored successfully');

        return redirect()->back();
    }


    /**
     * Import functionality to excel and csv file
     * for mass post creation from external file.
     *
     * @return \Illuminate\Http\Response
     */
    public function upload(){
        return view('posts.upload')->with('posts', Post::all());
    }

    public function storeUpload(Request $request){
        Excel::import(new PostsImport, $request->file('inputfile'));
        return redirect(route('posts.index'));
    }
}
