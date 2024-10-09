<?php

namespace App\Http\Requests;

use App\Enums\SizeQrCodeEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StorePrintRequest extends FormRequest
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
            'qty' => [
                'required',
                'integer',
                'min:1',
                'max:1000',
            ],
            'size' => [
                'required',
                'string',
                Rule::Enum(SizeQrCodeEnum::class),
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
