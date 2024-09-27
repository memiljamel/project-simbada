<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateResponsiblePersonRequest extends FormRequest
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
                Rule::unique('responsible_persons', 'name')->ignore($this->person),
            ],
            'position' => [
                'nullable',
                'string',
                'min:3',
                'max:100',
            ],
            'address' => [
                'nullable',
                'string',
                'min:3',
                'max:255',
                'regex:/(^[a-zA-Z0-9\s,.-]+$)/',
            ],
            'telephone' => [
                'nullable',
                'string',
                'min:10',
                'max:15',
            ],
            'email' => [
                'nullable',
                'email',
            ],
            'description' => [
                'nullable',
                'string',
                'min:3',
                'max:255',
            ],
        ];
    }
}
