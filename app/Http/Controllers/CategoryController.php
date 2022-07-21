<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        $categories=Category::all();
        return view('categories.index', compact('categories'));
    }


    public function create()
    {
        $categories=Category::all();
        return view('categories.create', compact('categories'));
    }


    public function store(Request $request)
    {
        //validate the input
        $request->validate([
            'name' => 'required',
        ]);

        //creat a new product
        Category::create($request->all());

        //redirect the user and send friendly message
        return redirect()->route('categories.index')->with('success','categories created successfully');
    }


    public function show (Category $category)
    {
        return view('categories.show', compact('category'));
    }


    public function edit (Category $category)
    {
        return view('categories.edit', compact('category'));
    }


    public function update(Request $request, Category $category)
    {
        // validate the input
        $request->validate([
            'name' => 'required',
            'is_active' => 'required|boolean',
        ]);
        //update category
        $category->update($request->all());
        //redirect the user and send friendly message
        return redirect()->route('categories.index')->with('success','category updated successfully');
    }


    public function destroy(Category $category)
    {
        // category->products()->delete();
        $category->delete();
        return redirect()->route('categories.index')->with('status','Category deleted Successfully');

    }
    public function changeStatus(Category $category)
    {
        $category->is_active = !$category->is_active;
        $category->update();
        return redirect()->route('categories.index')->with('status','Category active status has been changed successfully !');
    }
}
