<?php
// app/Http/Controllers/Api/ProjectController.php
namespace App\Http\Controllers\Api;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::latest()->paginate(10);
        return response()->json(['projects' => $projects]);
    }

    public function show($id)
    {
        $project = Project::findOrFail($id);
        return response()->json(['project' => $project]);
    }
}
