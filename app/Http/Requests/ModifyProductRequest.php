<?php

namespace App\Http\Requests;

class ModifyProductRequest extends JsonResponseFormRequest
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
            'id' => 'required|exists:products,id',
            'name' => 'nullable|min:4',
            'description' => 'nullable|min:16',
            'category_id' => 'nullable',
            'price' => 'nullable|numeric',
            'quantity' => 'nullable|integer',
            'image' => 'nullable|image',
            'thumbnail' => 'nullable|image',
        ];
    }
}
