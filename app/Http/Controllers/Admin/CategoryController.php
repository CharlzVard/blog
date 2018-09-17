<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index()
    {
        return view('admin.categories.index', [
          'categories' => Category::paginate(10)
        ]);
    }

    public function create()
    {
       return view('admin.categories.create', [
          'category'   => [],
          'categories' => Category::with('children')->where('parent_id', '0')->get(),
          'delimiter'  => ''
       ]);
    }

    public function store(Request $request)
    {
       Category::create($request->all());
       return redirect()->route('admin.category.index');
    }

    public function show(Category $category)
    {
        //
    }

    public function edit(Category $category)
    {
       return view('admin.categories.edit', [
          'category'   => $category,
          'categories' => Category::with('children')->where('parent_id', '0')->get(),
          'delimiter'  => ''
       ]);
    }

    public function update(Request $request, Category $category)
    {
       $category->update($request->except('slug'));
       return redirect()->route('admin.category.index');
    }

    public function destroy(Category $category)
    {
      $category->delete();
       return redirect()->route('admin.category.index');
    }
}
