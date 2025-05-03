<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Category;
use App\Http\Requests\ServiceRequest;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::with('category')->get();
        return view('services.index', compact('services'));
    }

    public function create()
    {
        $categories = Category::where('type', 'service')->get(); // <-- type: service
        return view('services.create', compact('categories'));
    }

    public function store(ServiceRequest $request)
    {
        $photoPaths = [];
        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $photo) {
                $photoPaths[] = $photo->store('services', 'public'); // folder
            }
        }

        Service::create([
            'category_id' => $request->category_id,
            'title' => $request->title,
            'description' => $request->description,
            'photos' => $photoPaths,
            'facilities' => $request->facilities,
            'seo_title' => $request->seo_title,
            'seo_keywords' => $request->seo_keywords,
        ]);

        return redirect()->route('services.index')->with('success', 'Service created successfully!');
    }

    public function edit(Service $service)
    {
        $categories = Category::where('type', 'service')->get(); // <-- type: service
        return view('services.edit', compact('service', 'categories'));
    }

    public function update(ServiceRequest $request, Service $service)
    {
        $data = $request->validated();
        $currentPhotos = $service->photos ?? [];

        if ($request->hasFile('photos')) {
            foreach ($currentPhotos as $photo) {
                Storage::disk('public')->delete($photo);
            }

            $newPhotoPaths = [];
            foreach ($request->file('photos') as $photo) {
                $newPhotoPaths[] = $photo->store('services', 'public'); // folder
            }
            $data['photos'] = $newPhotoPaths;
        } else {
            $data['photos'] = $currentPhotos;
        }

        $service->update($data);

        return redirect()->route('services.index')->with('success', 'Service updated successfully!');
    }

    public function destroy(Service $service)
    {
        foreach ($service->photos ?? [] as $photo) {
            Storage::disk('public')->delete($photo);
        }

        $service->delete();

        return redirect()->route('services.index')->with('success', 'Service deleted successfully!');
    }
}