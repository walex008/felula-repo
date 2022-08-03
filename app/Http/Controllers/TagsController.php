<?php

namespace App\Http\Controllers;

use App\Http\Requests\tags\CreateTagRequest;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('tags.index')->with('tags', Tag::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tags.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateTagRequest $request)
    {
        Tag::create([
            'name'=> $request->name
        ]);

        //flash message
        session()->flash('success', 'Tag created successfully!');

        //return redirect
        return redirect(route('tags.index'));
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
    public function edit(Tag $tag)
    {
        return view('tags.create')->with('tag', $tag);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateTagRequest $request, Tag $tag)
    {
        $tag->update([
            'name'=> $request->name
        ]);

        //flash message
        session()->flash('success', 'Tag updated successfully!');

        //return redirect
        return redirect(route('tags.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        //check if this tag belongs has post(s) attached to it

        if ($tag->posts->count() > 0){
            session()->flash('error', 'Tag is attached to one or more posts!');
            return redirect()->back();
        }
        $tag->delete();
        //flash message
        session()->flash('success', 'Tag deleted successfully!');

        //return redirect
        return redirect(route('tags.index'));

    }
}
