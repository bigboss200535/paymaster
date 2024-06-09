<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Designation extends Model
{
    use HasFactory;

    protected $table = 'designation';
    protected $primaryKey = 'designation_id';
    public $timestamps = false;

    protected $fillable =[
        'designation_id',
        'department_id',
        'designation',
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

    public function department(){
          return $this->belongsTo('App\Models\Department', 'department_id');
        }
}
