<?php
// app/Http/Requests/TestimonialRequest.php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TestimonialRequest extends FormRequest
{
    public function authorize()
    {
        return auth()->check();
    }
    
    public function rules()
    {
        return [
            'client_name' => 'required|string|max:255',
            'feedback' => 'required|string',
            'photo' => $this->isMethod('put') ? 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048' : 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }
}
