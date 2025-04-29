<?php
// app/Http/Controllers/Admin/SocialLinkController.php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SocialLink;
use App\Http\Requests\SocialLinkRequest;

class SocialLinkController extends Controller
{
    public function index()
    {
        $links = SocialLink::all();
        return view('admin.social_links.index', compact('links'));
    }

    public function create()
    {
        return view('admin.social_links.create');
    }

    public function store(SocialLinkRequest $request)
    {
        SocialLink::create($request->validated());
        return redirect()->route('admin.social_links.index');
    }

    public function edit(SocialLink $socialLink)
    {
        return view('admin.social_links.edit', compact('socialLink'));
    }

    public function update(SocialLinkRequest $request, SocialLink $socialLink)
    {
        $socialLink->update($request->validated());
        return redirect()->route('admin.social_links.index');
    }

    public function destroy(SocialLink $socialLink)
    {
        $socialLink->delete();
        return redirect()->route('admin.social_links.index');
    }
}
