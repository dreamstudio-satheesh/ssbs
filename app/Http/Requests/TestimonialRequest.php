<?php
// app/Http/Requests/TestimonialRequest.php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TestimonialRequest extends FormRequest
{
    public function rules()
    {
        return [
            'client_name' => 'required|string|max:255',
            'feedback' => 'required|string',
        ];
    }
}
