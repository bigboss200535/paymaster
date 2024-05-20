<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::rightJoin('product_category', 'product_category.category_id', '=', 'product.category_id')
        ->where('product.archived', 'No')
        ->select('product.product_id','product.product_name','product.added_date','product.status', 'product.barcode' ,'product.stocked','product.expirable','product_category.category_id as pro_id', 'product_category.category_name as category')
        ->orderBy('product.added_date', 'asc') 
        ->get();

        return view('product.index', compact('products', 'products'));
    }

    public function create()
    {
        $category = DB::table('product_category')->get();
        return view('product.create', compact('category', 'category'));
    }

    public function prices()
    {
        $product_prices = Product::rightJoin('product_price', 'product_price.product_id', '=', 'product.product_id')
        ->where('product.archived', 'No')
        ->select('product.product_id','product.product_name', 'product_price.added_date','product_price.status', 'product_price.batch_number' ,'product_price.cost_price',
        'product_price.wholesale_price', 'product_price.retail_price', 'product_price.effective_date',
        'product_price.end_date', 'product_price.user_id', 'product_price.distribution_price','product_price.product_id as pro_id')
        ->orderBy('product_price.added_date', 'asc') 
        ->get();

        return view('product.price', compact('product_prices', 'product_prices'));
    }
    
}
