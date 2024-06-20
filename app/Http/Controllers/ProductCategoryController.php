<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use App\Http\Controllers\ProductCategory;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class ProductCategoryController extends Controller
{
    public function index()
    {
        $category = ProductCategory::where('archived', 'No')->get();
        return view('category.index', compact('category', 'category'));
    }
   
    public function create()
    {

    }

    public function store(Request $request)
    {
        $validated_data = $request->validate([
            'category_name' => 'required|min:3|max:50',
            'category_status' => 'required|min:3|max:50',
        ]); 

        $existing_category = ProductCategory::where('category_name', $request->input('category_name')) ->first();
       
        if ($existing_category)
        {
            return 200;
         }

        $cat_id = $this->category_id($request);         
        $category = new ProductCategory();
        // $category->category_id = $cat_id;
        $category->category_name = $request->input('category_name');
        $category->status = $request->input('category_status');
        $category->added_date = now();
        $category->user_id =  Auth::user()->user_id;
        $category->added_id =  Auth::user()->user_id;
        $category->save();

        return 201;
    }

    private function category_id(Request $request)
    {
        // Retrieve the count of existing
        $count_payers = ProductCategory::count();
        // Extract the initials from the request
        $surname_initial = strtoupper(substr($request->input('category_name'), 0, 1));
        $firstname_initial = strtoupper(substr($request->input('category_status'), 0, 1));
        $count_plus_one = $count_payers + 1;
        $currentHour = date('H');
        $currentDay = date('d');
        $currentMonth = date('m');
        $currentYear = date('Y');
        $desiredLength = 4;
        $formatted_id = str_pad($count_plus_one, $desiredLength, '0', STR_PAD_LEFT);
        $category_id = $surname_initial.$formatted_id.$firstname_initial.$currentHour.$currentDay.$currentMonth.$currentYear;
        return $category_id;
    }

    public function show()
    {

    }

    public function edit($category_id)
    {
        $category = ProductCategory::findOrFail($category_id);
        return response()->json(['category' => $category]);
    }

    public function update(Request $request, $category_id)
    {
        $request->validate([
            'category_name' => 'required|string|max:30|min:3',
            'category_status' => 'required|string',
        ]);

        $category = ProductCategory::findOrFail($category_id);
        $category->updated_by =  Auth::user()->user_id;
        $category->updated_date = now();
        $category->status = $request->input('category_status');
        $category->update($request->all());

        return 201;
    }


    public function destroy(Request $request)
    {
    // Validate the request
    $request->validate([
        'category_id' => 'required',
    ]);
        
    $used_category = Product::where('category_id', $request->input('category_id')) ->first();
       
        if($used_category)
        {
            return 200;
        }
        $category = ProductCategory::find($request->category_id);
        $category->delete();
        return 201;

    }
}
