<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BeneficiaryModel extends Model
{
    use HasFactory;
    protected $table = 'beneficiary_data';
    protected $primaryKey = 'beneficiary_id';
    protected $fillable = [
        'b_name',
        'father_name',
        'gender',
        'age',
        'fmly_members',
        'occupation',
        'avg_mnthly_incm',
        'vlg_name',
        'teh_or_block_name',
        'panchayat_name',
        'b_img',
        'b_mobile',
        'b_mo_adhr_or_smgr_no',
    ];

   
public function baselineModels()
{
    return $this->hasMany(BaselineModel::class);
}

}
