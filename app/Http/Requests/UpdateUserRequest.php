<?php

namespace App\Http\Requests;

use App\Enums\PermissionEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class UpdateUserRequest extends FormRequest
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
            'name' => [
                'required',
                'string',
                'min:3',
                'max:100',
            ],
            'email' => [
                'required',
                'email',
                Rule::unique('users', 'email')->ignore($this->user),
            ],
            'password' => [
                'nullable',
                'string',
                'confirmed',
                Password::min(8)
                    ->letters()
                    ->mixedCase()
                    ->numbers()
                    ->symbols(),
            ],
            'description' => [
                'nullable',
                'string',
                'min:3',
                'max:255',
            ],
            'permissions' => [
                'required',
                'array',
                'min:1',
            ],
            'permissions.*' => [
                'required',
                'string',
                Rule::Enum(PermissionEnum::class),
            ],
        ];
    }
}
