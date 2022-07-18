<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Form extends FormRequest
{
    protected function prepareForValidation()
    {
        $this->merge([
            'name' => trim(strip_tags($this->name)),
        ]);
    }
}