<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;
    protected $table = 'department';
    protected $primaryKey = 'department_id';
    public $timestamps = false;

    protected $fillable =[
        'department_id',
        'department',
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
