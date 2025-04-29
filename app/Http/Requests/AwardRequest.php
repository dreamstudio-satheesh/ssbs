<?php
// app/Http/Requests/AwardRequest.php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AwardRequest extends FormRequest
{
    public function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'year' => 'required|integer',
        ];
    }
}