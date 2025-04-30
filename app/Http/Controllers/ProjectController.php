<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Category;
use App\Http\Requests\ProjectRequest;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::with('category')->get();
        return view('projects.index', compact('projects'));
    }

    public function create()
    {
        $categories = Category::where('type', 'project')->get(); // <-- changed type
        return view('projects.create', compact('categories'));
    }

    public function store(ProjectRequest $request)
    {
        $photoPaths = [];
        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $photo) {
                $photoPaths[] = $photo->store('projects', 'public'); // <-- folder name updated
            }
        }

        Project::create([
            'category_id' => $request->category_id,
            'title' => $request->title,
            'description' => $request->description,
            'photos' => $photoPaths,
            'facilities' => $request->facilities,
            'seo_title' => $request->seo_title,
            'seo_keywords' => $request->seo_keywords,
        ]);

        return redirect()->route('projects.index')->with('success', 'Project created successfully!');
    }

    public function edit(Project $project)
    {
        $categories = Category::where('type', 'project')->get(); // <-- changed type
        return view('projects.edit', compact('project', 'categories'));
    }

    public function update(ProjectRequest $request, Project $project)
    {
        $data = $request->validated();
        $currentPhotos = $project->photos ?? [];

        if ($request->hasFile('photos')) {
            foreach ($currentPhotos as $photo) {
                Storage::disk('public')->delete($photo);
            }

            $newPhotoPaths = [];
            foreach ($request->file('photos') as $photo) {
                $newPhotoPaths[] = $photo->store('projects', 'public'); // folder
            }
            $data['photos'] = $newPhotoPaths;
        } else {
            $data['photos'] = $currentPhotos;
        }

        $project->update($data);

        return redirect()->route('projects.index')->with('success', 'Project updated successfully!');
    }

    public function destroy(Project $project)
    {
        foreach ($project->photos ?? [] as $photo) {
            Storage::disk('public')->delete($photo);
        }

        $project->delete();

        return redirect()->route('projects.index')->with('success', 'Project deleted successfully!');
    }
}