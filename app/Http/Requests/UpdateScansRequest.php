<?php

namespace App\Http\Requests;

use App\Enums\AssetConditionEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateScansRequest extends FormRequest
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
            'photo' => [
                'nullable',
                'image',
                'max:1024',
                'mimes:jpeg,png',
            ],
            'condition' => [
                'required',
                'string',
                Rule::Enum(AssetConditionEnum::class),
            ],
        ];
    }
}
