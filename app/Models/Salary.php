<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    use HasFactory;
    // protected $primaryKey = '';
    protected $table = 'salary_account';
    public $timestamps = false;
    
    protected $fillable = [
        'employee_id',
        'account_number',
        'basic_salary',
        'allow_ssnit',
        'allow_paye',
        'added_by',
        'user_id',
        'added_date',
        'status',
        'archived',
    ];
}
