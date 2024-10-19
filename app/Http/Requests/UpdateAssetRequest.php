<?php

namespace App\Http\Requests;

use App\Enums\AssetStatusEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateAssetRequest extends FormRequest
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
            'code' => [
                'required',
                'string',
                'min:3',
                'max:100',
                Rule::unique('assets', 'code')->ignore($this->asset),
            ],
            'name' => [
                'required',
                'string',
                'min:3',
                'max:100',
            ],
            'category' => [
                'required',
                'string',
                'min:3',
                'max:100',
            ],
            'serial_number' => [
                'required',
                'string',
                'min:3',
                'max:100',
            ],
            'photo' => [
                'nullable',
                'image',
                'max:1024',
                'mimes:jpeg,png',
            ],
            'brand' => [
                'required',
                'string',
                'min:3',
                'max:100',
            ],
            'type' => [
                'required',
                'string',
                'min:3',
                'max:100',
            ],
            'size' => [
                'required',
                'string',
                'min:3',
                'max:100',
            ],
            'material' => [
                'required',
                'string',
                'min:3',
                'max:100',
            ],
            'purchase_year' => [
                'required',
                'integer',
                'digits:4',
            ],
            'distributor' => [
                'nullable',
                'string',
                'min:3',
                'max:100',
            ],
            'frame_number' => [
                'nullable',
                'string',
                'min:3',
                'max:100',
            ],
            'engine_number' => [
                'nullable',
                'string',
                'min:3',
                'max:100',
            ],
            'police_number' => [
                'nullable',
                'string',
                'min:3',
                'max:100',
            ],
            'bpkb_number' => [
                'nullable',
                'string',
                'min:3',
                'max:100',
            ],
            'origin' => [
                'required',
                'string',
                'min:3',
                'max:255',
            ],
            'unit_price' => [
                'required',
                'numeric',
                'min:1',
                'max:1000000000',
            ],
            'attachments' => [
                'nullable',
                'array',
                'max:5',
            ],
            'attachments.*' => [
                'nullable',
                'file',
            ],
            'status' => [
                'required',
                'string',
                Rule::Enum(AssetStatusEnum::class),
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
