<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductPricingController extends Controller
{
    public function index()
    {
        $product_prices = Product::rightJoin('product_price', 'product_price.product_id', '=', 'product.product_id')
        ->where('product.archived', 'No')
        ->select('product.product_id','product.product_name', 'product_price.added_date','product_price.status', 
        'product_price.batch_number' ,'product_price.cost_price', 'product_price.wholesale_price', 'product_price.retail_price', 
        'product_price.effective_date', 'product_price.end_date', 'product_price.user_id', 'product_price.distribution_price',
        'product_price.product_id as pro_id')
        ->orderBy('product_price.added_date', 'asc') 
        ->get();

        return view('product.price', compact('product_prices'));
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
