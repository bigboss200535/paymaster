<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Interview extends Model
{
    use HasFactory;

    protected $table = 'employee_interview';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
    //    'id',
        'title',
        'firstname',
        'middlename',
        'surname',
        'image',
        'gender',
        'birthdate',
        'email',
        'telephone',
        'interviewed',
        'employed',
        'employability_reason',
        'religion',
        'gh_card', 
        'user_id', 
        'file_number',
        'portfolio',
        'added_id',
        'barcode',
        'added_by',
        'added_date',
        'updated_by',
        'updated_date',
        'status', 
        'archived', 
        'archived_date',
        'archived_by',
    ];
}
