<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class ModifyUserRequest extends JsonResponseFormRequest
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
            'user_id' => 'required|exists:users,id',
            // First name and last name max are a reference of the longest name of the world
            'firstname' => 'required|min:2|max:17',
            'lastname' => 'required|min:2|max:32',
            'email' => 'required|email',
            'tel' => 'required',
            'password' => 'required|min:4',
        ];
    }
}
