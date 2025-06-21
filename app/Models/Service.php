<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id', 'title', 'description', 'photos',
        'facilities', 'seo_title', 'seo_keywords'
    ];

    protected $casts = [
        'photos' => 'array'
    ];

    // public function getImageUrlAttribute()
    // {
    //     $firstPhoto = $this->photos[0] ?? null;
    //     return $firstPhoto ? asset('storage/' . ltrim($firstPhoto, '/')) : null;
    // }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
