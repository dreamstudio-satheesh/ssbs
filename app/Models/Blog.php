<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $fillable = [
        'title', 'slug', 'content', 'feature_image',
        'seo_title', 'seo_keywords', 'seo_description'
    ];
}
