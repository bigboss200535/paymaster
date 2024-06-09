<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaxData extends Model
{
    use HasFactory;

    protected $table = 'tax_data';
    protected $primaryKey = 'tax_id';
    public $timestamps = false;
    
    protected $fillable = [
        'tax_id',
        'chargeable_income',
        // 'chargeable_income2',
        // 'chargeable_income3',
        // 'chargeable_income4',
        // 'chargeable_income5',
        // 'chargeable_income6',
        // 'chargeable_income7',
        'rate',
        // 'rate2',
        // 'rate3',
        // 'rate4',
        // 'rate5',
        // 'rate6',
        'tax_charged1',
        'tax_charged2',
        'tax_charged3',
        'tax_charged4',
        'tax_charged5',
        'tax_charged6',
        // 'cummulative_income1',
        // 'cummulative_income2',
        // 'cummulative_income3',
        // 'cummulative_income4',
        // 'cummulative_income5',
        // 'cummulative_income6',
        'effective_date',
        'expiry_date',
        'expiry_status',
        'user_id',
        'added_by',
        'added_date',
        'updated_by',
        'updated_date',
        'status',
        'archived',
        // 'updated_date',
        // 'status',
    ];
}
