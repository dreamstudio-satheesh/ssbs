<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhotoGallery extends Model
{
    use HasFactory;
   
    protected $fillable = ['title', 'photo_path', 'category_id'];


    public function getImageUrlAttribute()
    {
        $firstPhoto = $this->photos[0] ?? null;
        return $firstPhoto ? asset('storage/' . ltrim($firstPhoto, '/')) : null;
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    
}
