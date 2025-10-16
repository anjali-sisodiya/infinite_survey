<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UjwalaModel extends Model
{
    use HasFactory;
    protected $table = 'ujwala_scheme_details';
    protected $primaryKey = 'beneficiary_id';
    protected $fillable = [
        'beneficiary_id',
        'avail_lpg',
        'no_of_cylinders',
        'use_lpg_inaday',
        'months_onelpg_last',
        'pay_one_lpg',
        'it_affordabale',
        'use_traditional_cookstove',
        'prob_face_lpg',
    ];
}
