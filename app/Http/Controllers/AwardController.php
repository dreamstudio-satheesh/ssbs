<?php


// app/Http/Controllers/Admin/AwardController.php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Award;
use App\Http\Requests\AwardRequest;

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
        Award::create($request->validated());
        return redirect()->route('awards.index');
    }

    public function edit(Award $award)
    {
        return view('awards.edit', compact('award'));
    }

    public function update(AwardRequest $request, Award $award)
    {
        $award->update($request->validated());
        return redirect()->route('awards.index');
    }

    public function destroy(Award $award)
    {
        $award->delete();
        return redirect()->route('awards.index');
    }
}
