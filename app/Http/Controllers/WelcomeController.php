<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index(){
        return view('welcome')
            ->with('categories', Category::all())
            ->with('slide_posts', Post::latest()->limit(4)->get())
            ->with('tags', Tag::all())
            ->with('users', User::all())
            ->with('latest_post', Post::latest()->first())
            ->with('trending_posts', Post::latest()->limit(10)->get())
            ->with('old_posts', Post::simplePaginate(2));

    }

    public function show(Post $post){
        return view('blog.show')->with('post', $post);
    }
}
