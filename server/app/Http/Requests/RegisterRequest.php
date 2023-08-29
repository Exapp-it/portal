<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;

class RegisterRequest extends FormRequest
{

    protected $errors;


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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'min:2'],
            'email' => ['required', 'email', 'unique:users,email'],
            'currency' => ['required', Rule::in(config('settings.currencies'))],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ];
    }


    protected function failedValidation(Validator $validator)
    {
        $this->errors = $validator->errors();
    }

    public function hasFailed(): bool
    {
        return !is_null($this->errors);
    }

    public function getErrors()
    {
        return $this->errors;
    }
}
