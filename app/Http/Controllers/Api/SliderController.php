<?php

namespace App\Http\Controllers\Api;

use App\Models\Slider;
use App\Http\Controllers\Controller;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::select('id', 'title', 'subtitle', 'image_path', 'link', 'created_at')->latest()->get();

        return response()->json([
            'sliders' => $sliders
        ]);
    }
}
