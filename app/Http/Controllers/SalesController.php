<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class SalesController extends Controller
{
    public function index()
    {  

        // fetch all interviews
        // $applicant_list = DB::table('employee_interview')->get();
        $products = Product::rightJoin('product_category', 'product_category.category_id', '=', 'product.category_id')
        ->where('product.archived', 'No')
        ->select('product.product_id','product.product_name','product.added_date','product.status', 'product.barcode' ,'product.stocked','product.expirable','product_category.category_id as pro_id', 'product_category.category_name as category')
        ->orderBy('product.added_date', 'asc') 
        ->get();
        return view('sales.index', compact('products', 'products'));
    }

    

    public function discount()
    {
        
    }

    public function create()
    {
        
    }

    public function store()
    {
        
    }

    public function destroy()
    {
        
    }
}
