<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'product_category';
    protected $primaryKey = 'category_id';
    public $timestamps = false;
    protected $keyType = 'string';

    protected $fillable =[
        'category_id',
        'category_name',
        'added_id',
        'user_id',
        'added_date',
        'updated_by',
        'updated_date',
        'status',
        'archived',
        'archived_date',
        'archived_by'
    ];
}
