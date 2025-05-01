<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Http\Requests\BlogRequest;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    public function index()
    {
        $query = Blog::latest();

        if (request('search')) {
            $query->where('title', 'like', '%' . request('search') . '%')
                ->orWhere('slug', 'like', '%' . request('search') . '%');
        }

        $blogs = $query->paginate(10);
        return view('blogs.index', compact('blogs'));
    }

    public function create()
    {
        return view('blogs.create');
    }

    public function store(BlogRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('feature_image')) {
            $data['feature_image'] = $request->file('feature_image')->store('blogs', 'public');
        }

        // Auto-generate slug if not provided
        if (!$data['slug']) {
            $data['slug'] = \Str::slug($data['title']);
        }

        Blog::create($data);

        return redirect()->route('blogs.index')->with('success', 'Blog created successfully.');
    }

    public function edit(Blog $blog)
    {
        return view('blogs.edit', compact('blog'));
    }

    public function update(BlogRequest $request, Blog $blog)
    {
        $data = $request->validated();

        if ($request->hasFile('feature_image')) {
            Storage::disk('public')->delete($blog->feature_image);
            $data['feature_image'] = $request->file('feature_image')->store('blogs', 'public');
        }

        $blog->update($data);

        return redirect()->route('blogs.index')->with('success', 'Blog updated successfully.');
    }

    public function destroy(Blog $blog)
    {
        Storage::disk('public')->delete($blog->feature_image);
        $blog->delete();

        return redirect()->route('blogs.index')->with('success', 'Blog deleted successfully.');
    }
}
