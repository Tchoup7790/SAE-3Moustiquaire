<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;

class PaymentRequest extends JsonResponseFormRequest
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
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            // fullname max is a reference of the longest fullname in the world
            'numbers' => 'required|integer|digits:16',
            'fullname' => 'required|min:4|max:49',
            'expiration' => 'required|date',
        ];
    }
}
