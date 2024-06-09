<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $table = 'employee';
    public $primaryKey = 'employee_id';
    public $timestamps = false;
    protected $keyType = 'string';

    // public function user(){
    //     return $this->belongsTo('App\Models\Employee', 'user_id');
    //   }

      // public function department(){
      //   return $this->belongsTo('App\Models\Employee', 'department_id');
      // }

      // public function designation(){
      //   return $this->belongsTo('App\Models\Employee', 'designation_id');
      // }

    protected $fillable = [
        'employee_id',
        'title',
        'firstname',
        'middlename',
        'surname',
        'image',
        'gender',
        'birthdate',
        'ssnit_number',
        'staff_type',
        'dormate',
        'email',
        'telephone',
        'verified',
        'religion',
        'gh_card',
        'file_number',
        'department_id',
        'designation_id',
        'added_id',
        'barcode',
        'added_by',
        'added_date',
        'updated_by',
        'updated_date',
        'status',
        'user_id',
    ];

}
