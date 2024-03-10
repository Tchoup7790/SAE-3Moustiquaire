<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;

class JsonResponseFormRequest extends FormRequest
{
    protected function failedValidation(Validator $validator): RedirectResponse
    {
        return back()->setStatusCode(400)->withErrors($validator->errors());
    }
}
