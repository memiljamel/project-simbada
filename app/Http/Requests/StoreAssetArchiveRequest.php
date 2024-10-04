<?php

namespace App\Http\Requests;

use App\Enums\ReasonEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreAssetArchiveRequest extends FormRequest
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
            'inactive_date' => [
                'required',
                'date',
                'date_format:Y-m-d',
                'before_or_equal:today',
            ],
            'reason' => [
                'required',
                'string',
                Rule::Enum(ReasonEnum::class),
            ],
            'notes' => [
                'nullable',
                'string',
                'min:3',
                'max:255',
            ],
        ];
    }
}
