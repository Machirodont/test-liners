<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class SpecArrayValidator implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if(!is_array($value)) {
            $fail($attribute." must be an array.");
        }
        foreach ($value as $item) {
            if(!isset($item['name'])) {
                $fail($attribute." must be an array of objects with 'name' parameter.");
            }
            if(!isset($item['value'])) {
                $fail($attribute." must be an array of objects with 'value' parameter.");
            }
        }
    }
}
