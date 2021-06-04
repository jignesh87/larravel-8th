<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manufacturer extends Model
{
    use HasFactory;

    /**Override tablename from manufacturers to sz_...*/
    protected $table  = 'sz_manufacturers';

    /** Default timestamp column not used */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'alias',
        'name',
        'quickbook_manufacturer_id',
        'status',
        'updated_by'
    ];
}
