<?php
// app/Http/Requests/ProjectRequest.php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
{   
    public function authorize()
    {
        return auth()->check();
    }
    
    public function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'photos' => 'nullable|array',
            'facilities' => 'nullable|string',
            'seo_title' => 'nullable|string',
            'seo_keywords' => 'nullable|string',
        ];
    }
}
