<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BaselineModel extends Model
{
    use HasFactory;
    protected $table = 'baseline_information';
    protected $primaryKey = 'beneficiary_id';
    protected $fillable = [
        'beneficiary_id',
        'cookstove_type',
        'photo_cookstove',
        'no_of_meals',
        'avg_time_per_meal',
        'fuel_type',
        'prob_procured',
        'purchase_receipts',
        'fuel_amount',
        'problems_current_cookstove',
    ];
    // In BaselineModel.php
public function beneficiary()
{
    return $this->belongsTo(BeneficiaryModel::class);
}

}
