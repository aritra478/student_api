<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\Rule;

class UpdateStudentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $studentId = $this->route('student') instanceof \App\Models\Student
            ? $this->route('student')->id
            : $this->route('student');

        return [
            'name'  => 'required|string|max:255',
            'email' => [
                'required',
                'email',
                Rule::unique('students', 'email')->ignore($studentId),
            ],
            'phone' => [
                'required',
                'string',
                'digits:10',
                Rule::unique('students', 'phone')->ignore($studentId),
            ],
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
            'phone.digits'   => 'The phone must be exactly 10 digits.',
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
