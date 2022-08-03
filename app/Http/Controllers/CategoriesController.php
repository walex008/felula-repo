<?php

namespace App\Http\Controllers;

use App\Http\Requests\category\UpdateCategoryRequest;
use App\Http\Requests\CreateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('category.index')->with('categories', Category::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCategoryRequest $request)
    {
//        $this->validate($request, [
//           'name' => 'required|unique:categories'
//        ]);
        Category::create([
           'name' => $request->name
        ]);

        session()->flash('success', 'Category created successfully!');
        return redirect(route('categories.index'));
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
    public function edit(Category $category)
    {
//        $category = Category::find($id);
        return view('category.create')->with('category', $category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $category->update([
            'name' => $request->name
        ]);
        //flash a message to the user
        session()->flash('success', 'Category updated successfully!');

        //return to the category index page
        return redirect(route('categories.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //check if category has post(s)
        if($category->posts->count() > 0){
            session()->flash('error', 'Category has post(s) attached!');
            return redirect()->back();
        }
        $category->delete();
        //flash message
        session()->flash('success', 'Category deleted successfully!');

        //return a redirect to index

        return redirect(route('categories.index'));
    }
}
