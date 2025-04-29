<?php
// app/Http/Controllers/Admin/ProjectController.php
namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectRequest;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        return view('projects.index', compact('projects'));
    }

    public function create()
    {
        $categories = Category::where('type', 'project')->get();
        return view('projects.create',compact('categories'));
    }

    public function store(ProjectRequest $request)
    {
        Project::create($request->validated());
        return redirect()->route('projects.index');
    }

    public function edit(Project $project)
    {
        $categories = Category::where('type', 'project')->get();
        return view('projects.edit', compact('project'),compact('categories','project'));
    }

    public function update(ProjectRequest $request, Project $project)
    {
        $project->update($request->validated());
        return redirect()->route('projects.index');
    }

    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('projects.index');
    }
}
