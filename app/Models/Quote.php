<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    use HasFactory;
    protected $table = 'quote';
    protected $primaryKey = 'quote_id';
    public $timestamps = false;

    protected $fillable = [
            'quote_id',
            'quote',
            'added_date',
        ];

}
