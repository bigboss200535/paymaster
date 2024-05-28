<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\ProductPrice;

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
        return view('product.create', compact('category'));
    }

    public function store()
    {
       
    }

    public function prices()
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

    public function purchases()
    {
        $product = ProductPrice::rightJoin('product', 'product.product_id', '=', 'product_price.product_id')
        ->rightJoin('product_category', 'product_category.category_id', '=', 'product.category_id') // Join with product_category table
        ->where('product_price.archived', 'No')
        ->select('product.product_id', 'product_price.retail_price','product.product_name','product.added_date',
        'product.status', 'product.barcode' ,'product.stocked','product.expirable',
        'product_category.category_id as pro_id', 'product_category.category_name as category',
            DB::raw("CONCAT(product.product_name, ' | ', product_price.retail_price) as product_and_price")
        )
        ->orderBy('product_price.added_date', 'asc') 
        ->get();
        return view('product.purchases', compact('product')); 
        
        // $products = DB::table('product_price')
        //     ->join('product', 'product_price.product_id', '=', 'product.product_id') // Join with product table
        //     ->rightJoin('product_category', 'product_category.category_id', '=', 'product.category_id') // Join with product_category table
        //     ->where('product.archived', 'No')
        //     ->select(
        //         'product.product_id',
        //         'product_price.retail_price',
        //         'product.product_name',
        //         // 'product.added_date',
        //         'product.status',
        //         'product_price.retail_price',
        //         'product_price.wholesale_price',
        //         'product_price.distribution_price',
        //         'product.barcode',
        //         'product.stocked',
        //         'product.expirable',
        //         'product_category.category_id as pro_id',
        //         'product_category.category_name as category',
        //         DB::raw("CONCAT(product.product_name, ' | ', product_price.retail_price) as product_detail") // Concatenate product name and price
        //     )
        //     ->orderBy('product_price.added_date', 'asc')
        //     ->get();
        
        // Return the view with the products data
        return view('product.purchases', compact('products'));
    }


    public function requisitions()
    {
        
    }

    public function expiry()
    {
        
    }
    
}
