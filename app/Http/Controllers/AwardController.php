<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Award;
use App\Http\Requests\AwardRequest;
use Illuminate\Support\Facades\Storage;

class AwardController extends Controller
{
    public function index()
    {
        $awards = Award::all();
        return view('awards.index', compact('awards'));
    }

    public function create()
    {
        return view('awards.create');
    }

    public function store(AwardRequest $request)
    {
        // Handle file upload
        $path = $request->file('photo')->store('awards', 'public');

        Award::create([
            'title' => $request->title,
            'description' => $request->description,
            'photo_path' => $path,
        ]);

        return redirect()->route('awards.index')->with('success', 'Award created successfully!');
    }

    public function edit(Award $award)
    {
        return view('awards.edit', compact('award'));
    }

    public function update(AwardRequest $request, Award $award)
    {
        $data = $request->validated();

        // Handle photo update if new file is uploaded
        if ($request->hasFile('photo')) {
            // Delete old photo
            Storage::disk('public')->delete($award->photo_path);
            
            // Store new photo
            $data['photo_path'] = $request->file('photo')->store('awards', 'public');
        }

        $award->update($data);

        return redirect()->route('awards.index')->with('success', 'Award updated successfully!');
    }

    public function destroy(Award $award)
    {
        // Delete associated photo
        Storage::disk('public')->delete($award->photo_path);
        
        $award->delete();

        return redirect()->route('awards.index')->with('success', 'Award deleted successfully!');
    }
}