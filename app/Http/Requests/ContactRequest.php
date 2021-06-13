<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ContactRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'gender' => [
                'required',
                Rule::in(['mr', 'mme'])
            ],
            'name' => [
                'required',
                'string',
            ],
            'surname' => [
                'required',
                'string',
            ],
        ];
    }

}
