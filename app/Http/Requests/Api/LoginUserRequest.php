<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Validates the data sent to POST /api/v1/auth/login.
 */
class LoginUserRequest extends FormRequest
{
    /**
     * Anyone may try to log in, so authorization always passes.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * The validation rules. On failure Laravel stops here and returns 422.
     */
    public function rules(): array
    {
        return [
            'email'    => ['required', 'email'],
            'password' => ['required', 'string'],
        ];
    }
}