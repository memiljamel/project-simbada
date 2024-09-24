<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDistributorRequest extends FormRequest
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
                'unique:distributors,name',
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
            'officer' => [
                'nullable',
                'string',
                'min:3',
                'max:100',
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
