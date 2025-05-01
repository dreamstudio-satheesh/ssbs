<?php
// app/Http/Controllers/Admin/SocialLinkController.php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\SocialLink;
use App\Http\Requests\SocialLinkRequest;

class SocialLinkController extends Controller
{
    public function index()
    {
        $socialLinks = SocialLink::latest()->get();
        return view('social-links.index', compact('socialLinks'));
    }

    public function create()
    {
        return view('social-links.create');
    }

    public function store(SocialLinkRequest $request)
    {
        SocialLink::create($request->validated());

        return redirect()->route('social-links.index')->with('success', 'Social link added successfully.');
    }

    public function edit(SocialLink $socialLink)
    {
        return view('social-links.edit', compact('socialLink'));
    }

    public function update(SocialLinkRequest $request, SocialLink $socialLink)
    {
        $socialLink->update($request->validated());

        return redirect()->route('social-links.index')->with('success', 'Social link updated successfully.');
    }

    public function destroy(SocialLink $socialLink)
    {
        $socialLink->delete();

        return redirect()->route('social-links.index')->with('success', 'Social link deleted successfully.');
    }
}