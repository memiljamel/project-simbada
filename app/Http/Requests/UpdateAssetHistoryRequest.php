<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAssetHistoryRequest extends FormRequest
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
            'asset_id' => [
                'required',
                'uuid',
                'exists:assets,id',
            ],
            'date_from' => [
                'required',
                'date',
                'date_format:Y-m-d',
                'before_or_equal:today',
            ],
            'responsible_person' => [
                'required',
                'string',
                'min:3',
                'max:100',
            ],
            'location' => [
                'required',
                'string',
                'min:3',
                'max:100',
            ],
            'qty' => [
                'required',
                'integer',
                'min:1',
                'max:1000',
            ],
            'condition_percentage' => [
                'required',
                'integer',
                'min:1',
                'max:100',
            ],
            'completeness_percentage' => [
                'required',
                'integer',
                'min:1',
                'max:100',
            ],
            'notes' => [
                'nullable',
                'string',
                'min:3',
                'max:255',
            ],
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array<string, string>
     */
    public function attributes(): array
    {
        return [
            'asset_id' => 'asset name',
        ];
    }
}
