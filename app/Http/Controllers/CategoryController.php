<?php

namespace App\Http\Controllers;

use App\Models\Category;
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
        $categories = Category::latest()->get();
        return view('dashboard.admin.category.index')->with([ 'categories'=> $categories , 'i'=> 0 ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::latest()->get();
        return view('dashboard.admin.category.create')->with([ 'categories'=> $categories ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255', 'unique:categories,title'],
            'parent_id' => [ 'nullable', 'integer','gt:0', 'exists:categories,id'],
            'status' => ['nullable','boolean']
        ]);

        $data['status'] = $request->has('status');
        Category::create($data);

        return redirect()->route('categories.index')->with('message', 'Successfully created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return view('dashboard.admin.category.show')->with(['category' => $category]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {   
        $categories = Category::latest()->get();
        return view('dashboard.admin.category.edit')->with(['categories'=> $categories, 'category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255', 'unique:categories,title,'.$category->id],
            'parent_id' => ['nullable', 'integer','gt:0', 'exists:categories,id'],
            'status' => ['nullable','boolean']
        ]);

        $data['status'] = $request->has('status');
        $category->update($data);

        return redirect()->route('categories.index')->with('message', 'Successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('categories.index')->with('message', 'Successfully deleted');
    }
}
