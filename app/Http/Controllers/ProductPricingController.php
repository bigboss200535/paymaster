<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductPricingController extends Controller
{
    public function index()
    {
        $prices = Product::rightJoin('product_price', 'product_price.product_id', '=', 'product.product_id')
        ->where('product.archived', 'No')
        ->select('product.product_id','product.product_name', 'product_price.added_date','product_price.status', 
        'product_price.batch_number' ,'product_price.cost_price', 'product_price.wholesale_price', 'product_price.retail_price', 
        'product_price.effective_date', 'product_price.end_date', 'product_price.user_id', 'product_price.distribution_price',
        'product_price.product_id as pro_id')
        ->orderBy('product_price.added_date', 'asc') 
        ->get();

        $products = Product::where('archived', 'No')->where('status', '=','Active')->get();
        

        return view('product.price', compact('products', 'prices'));
    }

    public function create()
    {

    }

    public function store(Request $request)
    {
        $validate_data = $request->validate([
            'product_id' => 'required|min:3|max:50',
            'pricing_category' => 'nullable',
            'batch_number' => 'nullable',
            'cost_price' => 'nullable',
            'distribution_price' => 'nullable',
            'wholesale_price' => 'nullable',
            'retail_price' => 'nullable',
            'effective_date' => 'nullable',
            'end_date' => 'nullable',
            'status' => 'required|min:3|max:50',
            // 'sub_category' => 'nullable',
            // 'sales_type' => 'required',
            // 'expirable' => 'required',
            // 'stockable' => 'required',
           
        ]); 
    }

    public function show($product_id)
    {
        $product = Product::find($product_id);
        return response()->json(['product'=> $product]);
    }

    public function edit($product_id)
    {
        $product = Product::find($product_id);
        return response()->json(['product'=> $product]);  
    }

    public function update()
    {

    }

    public function destroy()
    {
        
    }
}
