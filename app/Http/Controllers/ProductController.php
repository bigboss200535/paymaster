<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\ProductPrice;
use App\Models\Category;
// use Illuminate\Pagination\Paginator;
// use Illuminate\View\View;



class ProductController extends Controller
{
    public function index()
    {
        $expired = Product::where('archived', 'No')->where('status', '=','Active')->get();
        $count_new = Product::where('archived', 'No')->where('status', '=','Active')->get();
        $count_new = Product::where('archived', 'No')->where('status', '=','Active')->get();
        $products = Product::rightJoin('product_category', 'product_category.category_id', '=', 'product.category_id')
        ->where('product.archived', 'No')
        ->select('product.product_id','product.product_name','product.added_date','product.status' ,'product.stocked','product.expirable','product_category.category_id as pro_id', 'product_category.category_name as category')
        ->orderBy('product.added_date', 'asc') 
        ->get();

        return view('product.index', compact('products', 'products'));
    }

    public function create()
    {
        $category = Category::where('archived', 'No')->where('status', '=','Active')->get();
        $products = Product::rightJoin('product_category', 'product_category.category_id', '=', 'product.category_id')
        ->where('product.archived', 'No')
        ->select('product.product_id','product.product_name','product.added_date','product.status' ,'product.stocked','product.expirable','product_category.category_id as pro_id', 'product_category.category_name as category')
        ->orderBy('product.added_date', 'asc') 
        ->paginate(5);

        return view('product.create', compact('category', 'products'));
    }

    public function store(Request $request)
    {
        // $image_path = '';

        // if ($request->hasFile('image')) {
        //     $image_path = $request->file('image')->store('products', 'public');
        // }

        $product = Product::create([
            'product_name' => $request->product_name,
            'category_id' => $request->category_id,
            // 'image' => $image_path,
            // 'barcode' => $request->barcode,
            'stocked' => $request->price,
            'expirable' => $request->quantity,
            'user_id' => $request->user_id,
            'status' => $request->status,
            'added_date' => $request->added_date,
            'status' => $request->status
        ]);

        if (!$product) {
            return redirect()->back()->with('error', 'Sorry, Something went wrong while creating product.');
        }
        return redirect()->route('products.index')->with('success', 'Success, New product has been added successfully!');
    }

    private function product_id(Request $request)
    {
        // Retrieve the count of existing
        $count_payers = Product::count();
        // Extract the initials from the request
        $surname_initial = strtoupper(substr($request->input('product_name'), 0, 1));
        $firstname_initial = strtoupper(substr($request->input('category_status'), 0, 1));
        $count_plus_one = $count_payers + 1;
        $currentHour = date('H');
        $currentDay = date('d');
        $currentMonth = date('m');
        $currentYear = date('Y');
        $desiredLength = 4;
        $formatted_id = str_pad($count_plus_one, $desiredLength, '0', STR_PAD_LEFT);
        $product_id = $surname_initial.$formatted_id.$firstname_initial.$currentHour.$currentDay.$currentMonth.$currentYear;
        return $product_id;
    }


    public function show($product_id)
    {
        $product = Product::findOrFail($product_id);
        $category = Category::where('archived', 'No')->where('status', '=','Active')->get();

        // return view('product.show', compact('invoice','sales'));
    }

    public function edit($product_id)
    {
        $product = Product::find($product_id);
        // $category = Category::where('archived', 'No')->where('status', '=','Active')->get();
        // $category = Category::where('archived', 'No')->where('status', '=','Active')->get();
        // $product = Product::rightJoin('product_category', 'product_category.category_id', '=', 'product.category_id')
        // ->where('product.archived', 'No')
        // ->where('product.product_id', $product_id)
        // ->select('product.product_id','product.product_name','product.added_date','product.status' ,'product.stocked','product.expirable','product_category.category_id as pro_id', 'product_category.category_name as category')
        // ->orderBy('product.added_date', 'asc') 
        // ->get();
        return response()->json(['product'=> $product]);

        // return view('category.edit', compact('category'));
    }

    public function update(Request $request, $product_id)
    {
        $request->validate([
            'product_name' => 'required|min:3|regex:/^[a-zA-Z ]+$/',
        ]);

        $product = Category::findOrFail($product_id);
        $product->name = $request->name;
        // $category->slug = str_slug($request->name);
        $product->save();

        return redirect()->back()->with('message', 'Category updated successfully!');
    }

    public function destroy(Request $request)
    {
    // Validate the request
    $request->validate([
        'product_id' => 'required',
    ]);
        
        $used_product_price = ProductPrice::where('product_id', $request->input('product_id')) ->first();
        $used_product_stock = ProductPrice::where('product_id', $request->input('product_id')) ->first();
        
        if($used_product_stock || $used_product_price)
        {
            return 200;
        }
        $category = Product::find($request->product_id);
        $category->delete();
        return 201;

    }


    // public function update(Request $request)
    // {
        // $product->name = $request->name;
        // $product->description = $request->description;
        // $product->barcode = $request->barcode;
        // $product->price = $request->price;
        // $product->quantity = $request->quantity;
        // $product->status = $request->status;

        // if ($request->hasFile('image')) {
        //     // Delete old image
        //     if ($product->image) {
        //         Storage::delete($product->image);
        //     }
        //     // Store image
        //     $image_path = $request->file('image')->store('products', 'public');
        //     // Save to Database
        //     $product->image = $image_path;
        // }

        // if (!$product->save()) {
        //     return redirect()->back()->with('error', 'Sorry, Something went wrong while updating product.');
        // }
        // return redirect()->route('products.index')->with('success', 'Success, Product has been updated.');
    // }

    

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
        'product.status' ,'product.stocked','product.expirable',
        'product_category.category_id as pro_id', 'product_category.category_name as category',
            DB::raw("CONCAT(product.product_name, ' | ', product_price.retail_price) as product_and_price")
        )
        ->orderBy('product_price.added_date', 'asc') 
        ->get();

        return view('product.purchases', compact('product')); 
    }


    public function purchases_approval()
    {
        
    }

    public function requisitions()
    {
        
    }

    public function requisitions_approval()
    {
        
    }
    
    public function stock_adjustment()
    {
        
    }

    public function stock_adjustment_approval()
    {
        
    }

    public function expiry()
    {
        
    }
    
}
