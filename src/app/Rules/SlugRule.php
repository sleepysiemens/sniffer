<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class SlugRule implements ValidationRule
{
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (!is_string($value) || $value === '') {
            $fail('field must be not empty string');
            return;
        }

        $allowed = 'abcdefghijklmnopqrstuvwxyz-_';

        if (strspn($value, $allowed) !== strlen($value)) {
            $fail('field contains forbidden characters');
        }
    }
}
