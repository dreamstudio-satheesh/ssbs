<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id', 'title', 'description', 'photos',
        'facilities', 'seo_title', 'seo_keywords'
    ];

    protected $casts = [
        'photos' => 'array'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
