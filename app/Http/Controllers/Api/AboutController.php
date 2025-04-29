<?php
// app/Http/Controllers/Api/AboutController.php
namespace App\Http\Controllers\Api;

use App\Models\Award;
use App\Models\Management;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AboutController extends Controller
{
    public function index()
    {
        $about = [
            'company' => 'Company description here',
            'management' => Management::all(),
            'awards' => Award::latest()->get()
        ];

        return response()->json($about);
    }
}
