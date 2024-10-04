<?php

namespace App\Http\Requests;

use App\Enums\FinanceTypeEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreAssetFinanceRequest extends FormRequest
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
            'type' => [
                'required',
                'string',
                Rule::Enum(FinanceTypeEnum::class),
            ],
            'date' => [
                'required',
                'date',
                'date_format:Y-m-d',
                'before_or_equal:today',
            ],
            'amount' => [
                'required',
                'numeric',
                'min:1',
                'max:1000000000',
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
