<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductPrice;
use Illuminate\Support\Facades\Auth;

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

        $products = Product::rightJoin('product_price', 'product_price.product_id', '=', 'product.product_id')
        ->where('product.archived', 'No')
        ->select('product.product_id','product.product_name', 'product_price.added_date','product_price.status', 
        'product_price.batch_number' ,'product_price.cost_price', 'product_price.wholesale_price', 'product_price.retail_price', 
        'product_price.effective_date', 'product_price.end_date', 'product_price.user_id', 'product_price.distribution_price',
        'product_price.product_id as pro_id')
        ->orderBy('product_price.added_date', 'asc') 
        ->get();
        

        return view('product.price', compact('products', 'prices'));
    }

    public function create()
    {

    }

    public function store(Request $request)
    {
        $validate_data = $request->validate([
            'product_id' => 'required|min:3|max:50',
            'cost_price' => 'nullable',
            'selling_price' => 'nullable',
            'distribution_price' => 'nullable',
            'wholesale_price' => 'nullable',
            'effective_date' => 'nullable',
            'end_date' => 'nullable',
            'status' => 'required|min:3|max:50',           
        ]); 

         $existing_price = ProductPrice::where('product_id', $request->input('product_id'))->exists();
       
        if($existing_price)
        {
            $product = ProductPrice::where('archived', 'No')->where('product_id', '=', $request->input('product_id'))->first();
            $product->cost_price = $request->input('cost_price');
            $product->retail_price = $request->input('selling_price');
            $product->distribution_price = $request->input('distribution_price');
            $product->wholesale_price = $request->input('wholesale_price');
            $product->effective_date = $request->input('effective_date');
            $product->end_date = $request->input('end_date');
            $product->status = $request->input('status');
            $product->updated_by =  Auth::user()->fullname;
            $product->updated_date =  now();
            $product->update($request->all());

            return 200;

         }else{
            // $pro_id = $request->input('product_id');       
            $product = new ProductPrice();
            $pro_id = $this->price_id($request);  
            $product->pp_id = $pro_id; 
            // $product->product_id = $request->input('product_id'); 
            $product->product_id = $request->input('product_id');   
            $product->cost_price = $request->input('cost_price');
            $product->pricing_category = 'None';
            $product->batch_number = 'None';
            $product->retail_price = $request->input('selling_price');
            $product->distribution_price = $request->input('distribution_price');
            $product->wholesale_price = $request->input('wholesale_price');
            $product->effective_date = $request->input('effective_date');
            $product->end_date = $request->input('end_date');
            $product->status = $request->input('status');
            $product->added_date = now();
            $product->user_id =  Auth::user()->user_id;
            $product->added_by =  Auth::user()->fullname;
            $product->added_id =  Auth::user()->user_id;
            $product->save();

            return 201;

         }

        
    }

    private function price_id(Request $request)
    {
        // Retrieve the count of existing
        $count_payers = ProductPrice::count();
        // Extract the initials from the request
        $id_initial = strtoupper(substr($request->input('product_id'), 0, 1));
        // $firstname_initial = strtoupper(substr($request->input('category_status'), 0, 1));
        $count_plus_one = $count_payers + 1;
        $currentHour = date('H');
        $currentDay = date('d');
        $currentMonth = date('m');
        $currentYear = date('Y');
        $desiredLength = 4;
        $formatted_id = str_pad($count_plus_one, $desiredLength, '0', STR_PAD_LEFT);
        $pp_id = $id_initial.$formatted_id.$currentHour.$currentDay.$currentMonth.$currentYear;
        return $pp_id;
    }

    public function show($product_id)
    {
        $check_price = ProductPrice::where('archived', 'No')->where('product_id', '=', $product_id)->exists();
      
        if($check_price){

            $product = ProductPrice::rightJoin('product', 'product.product_id', '=', 'product_price.product_id')
            ->where('product.archived', 'No')
            ->select('product.product_id','product.product_name', 'product_price.added_date','product_price.status', 
            'product_price.batch_number' ,'product_price.cost_price', 'product_price.wholesale_price', 'product_price.retail_price', 
            'product_price.effective_date', 'product_price.end_date', 'product_price.user_id', 'product_price.distribution_price',
            'product_price.product_id as pro_id')
            // ->orderBy('product_price.added_date', 'asc') 
            ->first();
           
        }else{
            // $product = ProductPrice::where('archived', 'No')->where('product_id', '=', $product_id)->get();
            $product = Product::where('archived', 'No')->where('product_id', '=', $product_id)->first();
        }
    
        return response()->json(['product'=> $product]);
    }

    public function edit($product_id)
    {
        // $product = Product::find($product_id);
        // return response()->json(['product'=> $product]);  
    }

    public function update(Request $request, $product_id)
    {
        $request->validate([
            'product_id' => 'required|min:3|max:50',
            'cost_price' => 'nullable',
            'selling_price' => 'nullable',
            'distribution_price' => 'nullable',
            'wholesale_price' => 'nullable',
            'effective_date' => 'nullable',
            'end_date' => 'nullable',
            'status' => 'required|min:3|max:50',  
        ]);

        $product = ProductPrice::where('archived', 'No')->where('product_id', '=', $product_id)->first();
        $product->product_id = $request->input('product_id');
      
        $product->updated_by =  Auth::user()->user_id;
        $product->updated_date = now();
        $product->status = $request->input('status');
        $product->update($request->all());

        return 201;
    }

    public function generate_pdf($product_id)
    {
        $product_price = ProductPrice::with(['roduct_price.product_id'])->where('id', $product_id)->first();
        
    }

    public function destroy()
    {
        
    }
}
