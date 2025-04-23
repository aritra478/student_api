<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
class UpdateStudentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name'  => 'required|string|max:255',
            'email' => 'required|email|unique:students,email,' . $this->student->id,
            'phone' => 'required|string|digits:10|unique:students,phone,' . $this->student->id,
        ];
    }

    public function messages(): array
    {
        return [
            'name.required'  => 'The name field is required.',
            'email.required' => 'The email field is required.',
            'email.email'    => 'The email must be a valid email address.',
            'email.unique'   => 'This email is already taken.',
            'phone.required' => 'The phone field is required.',
            'phone.unique'   => 'This phone number is already taken.',
        ];
    }
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success' => false,
            'message' => 'Validation failed.',
            'errors'  => $validator->errors()
        ], 422));
    }
}

