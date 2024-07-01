<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductPrice extends Model
{
    use HasFactory;
    protected $table = 'product_price';
    public $timestamps = false;

    
    protected $fillable =[
        'pp_id',
        'product_id',
        'pricing_category',
        'batch_number',
        'cost_price',
        'distribution_price',
        'wholesale_price',
        'retail_price',
        'effective_date',
        'end_date',
        'status_flag',
        'added_id',
        'user_id',
        'added_date',
        'updated_by',
        'updated_date',
        'status',
        'archived',
        'archived_date',
        'archived_by',
        '_token',
    ];
}
