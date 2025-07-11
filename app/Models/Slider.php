<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'subtitle', 'image_path', 'link'];


    public function getImageUrlAttribute()
    {
        return asset('storage/' . ltrim($this->image_path, '/'));
    }
}
