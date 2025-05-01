<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AwardRequest extends FormRequest
{
    public function authorize()
    {
        // Only allow authenticated users for create, store, edit, update, destroy
        if (in_array($this->route()->getActionMethod(), ['store', 'update', 'destroy'])) {
            // Check if the user is authenticated
            return $this->user() !== null;
        }

        // Allow guests to view index/show
        return true;
    }

    public function rules()
    {
        $rules = [
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ];

        // Photo is required only for store (create) operation
        if ($this->isMethod('post')) {
            $rules['photo'] = 'required|image|mimes:jpeg,png,jpg|max:2048';
        } else {
            $rules['photo'] = 'nullable|image|mimes:jpeg,png,jpg|max:2048';
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'photo.required' => 'Award photo is required',
            'photo.image' => 'The file must be an image',
            'photo.mimes' => 'Only JPEG, PNG, and JPG images are allowed',
            'photo.max' => 'Image size must be less than 2MB',
        ];
    }
}
