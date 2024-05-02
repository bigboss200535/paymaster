<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gender extends Model
{
    use HasFactory;

    protected $table = 'gender';
    protected $primaryKey = 'gender_id';
    public $timestamps = false;
    
    protected $fillable = [
        //    'id',
            'gender_id',
            'gender',
            // 'added_id',
            // 'user_id',
            'added_by',
            'added_date',
            // 'updated_by',
            // 'updated_date',
            'status', 
            'archived', 
            'archived_date',
            'archived_by',
        ];
}
