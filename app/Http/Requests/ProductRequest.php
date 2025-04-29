<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = [
            'category_id' => 'required|exists:categories,id',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'facilities' => 'nullable|string',
            'seo_title' => 'nullable|string',
            'seo_keywords' => 'nullable|string',
        ];

        // For create operation
        if ($this->isMethod('post')) {
            $rules['photos'] = 'required|array';
            $rules['photos.*'] = 'image|mimes:jpeg,png,jpg|max:2048';
        } 
        // For update operation
        else {
            $rules['photos'] = 'nullable|array';
            $rules['photos.*'] = 'nullable|image|mimes:jpeg,png,jpg|max:2048';
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'photos.required' => 'At least one product image is required',
            'photos.*.image' => 'Each file must be an image',
            'photos.*.mimes' => 'Only JPEG, PNG, and JPG images are allowed',
            'photos.*.max' => 'Each image must be less than 2MB',
        ];
    }
}