<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    	'manufacturer_id',
        'alias',
        'brand_name',
        'narrative',
        'status',
        'quick_book_brand_id'
    ];
}
