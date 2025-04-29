<?php
// app/Http/Controllers/Api/ContactController.php
namespace App\Http\Controllers\Api;

use App\Models\Enquiry;
use Illuminate\Http\Request;
use App\Mail\EnquiryReceived;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required|string',
            'phone' => 'nullable|string|max:20',
        ]);

        $enquiry = Enquiry::create($validated);

        // Send email to admin
        Mail::to('admin@example.com')->send(new EnquiryReceived($enquiry));

        return response()->json(['message' => 'Your enquiry has been received.']);
    }
}
