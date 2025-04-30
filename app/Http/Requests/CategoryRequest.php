<?php
// app/Http/Requests/CategoryRequest.php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'type' => 'required|in:product,service,project,gallery,blog',
        ];
    }
}
