<?php

namespace App\Traits;

use App\Exceptions\CustomValidationException;
use Illuminate\Contracts\Validation\Validator;

trait FailedValidation
{
    protected function failedValidation(Validator $validator)
    {
        throw  new CustomValidationException($validator->errors());
    }
}
