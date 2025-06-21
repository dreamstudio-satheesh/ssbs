<?php

namespace App\Http\Controllers\Api;

use App\Models\Blog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BlogApiController extends Controller
{
    public function index(Request $request)
    {
        $query = Blog::latest();

        if ($request->has('search')) {
            $query->where('title', 'like', '%' . $request->search . '%')
                  ->orWhere('slug', 'like', '%' . $request->search . '%');
        }

        $blogs = $query->select('id', 'title', 'slug', 'feature_image', 'content', 'created_at')->paginate(5);

        return response()->json([
            'blogs' => $blogs,
        ]);
    }

    public function show($slug)
    {
        $blog = Blog::where('slug', $slug)->select('id', 'title', 'slug', 'feature_image', 'content', 'created_at')->firstOrFail();

        return response()->json([
            'blog' => $blog,
        ]);
    }
}
