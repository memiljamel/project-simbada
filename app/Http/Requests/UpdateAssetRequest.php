<?php

namespace App\Http\Requests;

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
            'name' => [
                'required',
                'string',
                'min:3',
                'max:100',
            ],
            'code' => [
                'required',
                'string',
                'min:3',
                'max:100',
                Rule::unique('assets', 'code')->ignore($this->asset),
            ],
            'category' => [
                'required',
                'string',
                'min:3',
                'max:100',
            ],
            'photo' => [
                'nullable',
                'image',
                'max:1024',
                'mimes:jpg,jpeg,png',
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
            'manufacturer' => [
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
                Rule::unique('assets', 'serial_number')->ignore($this->asset),
            ],
            'production_year' => [
                'required',
                'integer',
                'digits:4',
            ],
            'description' => [
                'nullable',
                'string',
                'min:3',
                'max:255',
            ],
            'purchase_date' => [
                'required',
                'date',
                'date_format:Y-m-d',
                'before_or_equal:today',
            ],
            'distributor' => [
                'required',
                'string',
                'min:3',
                'max:100',
            ],
            'invoice_number' => [
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
                'max:1024',
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
