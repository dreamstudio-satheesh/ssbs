<?php
// app/Http/Controllers/Api/AwardController.php
namespace App\Http\Controllers\Api;

use App\Models\Award;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AwardController extends Controller
{
    public function index()
    {
        $awards = Award::latest()->get();
        return response()->json(['awards' => $awards]);
    }
}
