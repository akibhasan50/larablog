<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$showcat = Category::select('name','slug','status')->get();
        $showcat = Category::with('posts')->orderBy('id','desc')->get();
        //dd($showcat);
        return view('backend.layout.catagories',compact('showcat'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.layout.addcategory');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = new Category();
        $request->validate([
            'name'=>'required|unique:categories,name',
            
        ]);
        $category->name = $request->name;
        $category->save();

        $request->session()->flash('msg','Category Inserted');
        return redirect('admin/categories/');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category,$id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category,$id)
    {
        $cat = Category::Find($id);
        return view('backend.layout.editcat',compact('cat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category,$id)
    {
        $category = Category::Find($id);
        $request->validate([
            'name'=>'required|unique:categories,name,'.$category->id,
            'status'=>'required',
            
        ]);
        $category->name = $request->name;
        $category->status = $request->status;

        //dd($category);
        $category->save();

        $request->session()->flash('msg','Category updated successfully');
        return redirect('admin/categories/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category,$id)
    {
        $del = Category::destroy($id);

       session()->flash('msg','Category Deleted successfully');
        return redirect('admin/categories/');
    }
}
