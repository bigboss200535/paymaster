<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    use HasFactory;
    protected $table = 'product';
    protected $primaryKey = 'product_id';
    public $timestamps = false;
    protected $keyType = 'string';

    protected $fillable =[
        'product_id',
        'product_name',
        'category_id',
        'description',
        'image',
        'stocked',
        'expirable',
        'barcode',
        'added_id',
        'user_id',
        'added_id',
        'added_date',
        'updated_by',
        'updated_date',
        'status',
        'archived',
        'archived_date',
        'archived_by'
    ];

    public function getAvatarUrl()
    {
        return Storage::url($this->avatar);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
