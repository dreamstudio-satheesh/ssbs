<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SteelRateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // Only allow authenticated users for create, store, edit, update, destroy
        if (in_array($this->route()->getActionMethod(), ['store', 'update', 'destroy'])) {
            return $this->user() !== null;
        }

        // Allow guests to view index/show
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'product_id' => 'required|exists:products,id',
            'steel_rate_value' => 'required|numeric|min:0',
            'effective_date' => 'required|date',
        ];
    }
}
