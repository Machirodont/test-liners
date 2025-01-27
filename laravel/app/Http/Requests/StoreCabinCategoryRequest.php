<?php

namespace App\Http\Requests;

use App\Enums\CabinCategoryTypeEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreCabinCategoryRequest extends FormRequest
{
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
            'ship_id'      => 'required|exists:ships,id',
            'vendor_code'  => 'required|string|max:10',
            'title'        => 'required|string|max:255',
            'type'         => ['nullable', Rule::enum(CabinCategoryTypeEnum::class)],
            'description'  => 'required|string',
            'ordering'     => 'required|integer|min:0',
            'state'        => 'boolean',
        ];
    }
}
