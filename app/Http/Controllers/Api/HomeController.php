<?php

// app/Http/Controllers/Api/HomeController.php
namespace App\Http\Controllers\Api;

use App\Models\Slider;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $projects = Project::latest()->take(5)->get();
        $sliders = Slider::latest()->take(5)->get();

        return response()->json([
            'projects' => $projects,
            'sliders' => $sliders,
            'calculator_config' => config('calculator')  // Assuming you have a config file for calculator
        ]);
    }
}
