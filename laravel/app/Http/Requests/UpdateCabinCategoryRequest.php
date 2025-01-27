<?php

namespace App\Http\Requests;

use App\Enums\CabinCategoryTypeEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCabinCategoryRequest extends FormRequest
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
            'cabin_category_id' => 'required|integer|exists:cabin_categories,id',
            'vendor_code' => 'required|string|max:10',
            'title'       => 'required|string|max:255',
            'type'        => ['nullable', Rule::enum(CabinCategoryTypeEnum::class)],
            'description' => 'required|string',
            'ordering'    => 'required|integer|min:0',
            'state'       => 'boolean',
        ];
    }
}
