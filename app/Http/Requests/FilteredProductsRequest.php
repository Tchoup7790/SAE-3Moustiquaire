<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FilteredProductsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'search' => 'nullable|string',
            'category' => 'nullable|array',
            'category.*' => 'integer',
            'price' => 'nullable|numeric',
        ];
    }
}
