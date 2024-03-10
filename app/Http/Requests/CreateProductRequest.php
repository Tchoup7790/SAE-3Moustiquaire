<?php

namespace App\Http\Requests;

class CreateProductRequest extends JsonResponseFormRequest
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
            'name' => 'required|min:4',
            'description' => 'required|min:16',
            'category_id' => 'required',
            'price' => 'required|decimal',
            'quantity' => 'required|integer',
            'image' => 'required|image',
            'thumbnail' => 'required|image',
        ];
    }
}
