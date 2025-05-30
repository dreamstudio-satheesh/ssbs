<?php
// app/Http/Requests/PhotoGalleryRequest.php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PhotoGalleryRequest extends FormRequest
{

    public function authorize()
    {
        return auth()->check();
    }
    
    public function rules()
    {
        return [
            'photo' => 'required|image|max:10240',
            'title' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
        ];
    }
}
