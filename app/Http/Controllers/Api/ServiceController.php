<?php
// app/Http/Controllers/Api/ServiceController.php
namespace App\Http\Controllers\Api;

use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::latest()->paginate(10);
        return response()->json(['services' => $services]);
    }

    public function show($id)
    {
        $service = Service::findOrFail($id);
        return response()->json(['service' => $service]);
    }
}
