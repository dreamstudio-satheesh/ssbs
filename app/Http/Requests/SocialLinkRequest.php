<?php
// app/Http/Requests/SocialLinkRequest.php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SocialLinkRequest extends FormRequest
{
    public function rules()
    {
        return [
            'platform' => 'required|string|max:255',
            'url' => 'required|url',
        ];
    }
}
