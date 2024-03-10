<?php

namespace App\Http\Requests;

class RegisterRequest extends JsonResponseFormRequest
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
            // First name and last name max are a reference of the longest name of the world
            'firstname' => 'required|min:2|max:17',
            'lastname' => 'required|min:2|max:32',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:4',
            'tel' => 'required',
        ];
    }
}
