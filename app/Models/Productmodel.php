<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Productmodel extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'products';
     //public $timestamps=false;
    protected $fillable = [
        'product_name',
        'product_price',
        'product_img',
    ];
}
