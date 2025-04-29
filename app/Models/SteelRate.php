<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SteelRate extends Model
{
    use HasFactory;
    protected $fillable = ['product_id', 'steel_rate_value', 'effective_date'];
}
