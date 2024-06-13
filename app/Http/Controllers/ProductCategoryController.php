<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\ProductCategory;
use App\Models\Category;


class ProductCategoryController extends Controller
{
    public function index()
    {
        $category = Category::where('archived', 'No')->get();
        return view('category.index', compact('category', 'category'));
    }
   
    public function create()
    {

    }

    public function store()
    {

    }

    public function show()
    {

    }

    public function edit()
    {

    }

    public function update()
    {

    }

    public function destroy()
    {
        
    }
}
