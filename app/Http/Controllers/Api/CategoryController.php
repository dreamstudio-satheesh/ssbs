<?php

namespace App\Http\Controllers\Api;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        // Optional type filter: ?type=project or ?type=product
        $query = Category::query();

        if ($request->has('type')) {
            $query->where('type', $request->type);
        }

        $categories = $query->orderBy('name')->get();

        return response()->json(['categories' => $categories]);
    }

    public function show($id)
    {
        $category = Category::findOrFail($id);

        return response()->json(['category' => $category]);
    }
}
