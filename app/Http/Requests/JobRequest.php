<?php

namespace App\Http\Requests;

use App\Models\Job;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use PHPUnit\Framework\SkippedTestError;
use Str;

class JobRequest extends FormRequest
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
    public function rules()
    {
        if (in_array($this->getMethod(), ['PUT', 'PATCH'])) {
            return $this->updateRules();
        } else {
            return [
                'name' => [
                    'required',
                    'string',
                ],
                'label' => [
                    'required',
                    'string',
                    Rule::unique('jobs', 'label'),
                ],
            ];
        }
    }

    public function updateRules()
    {
        return [
            'name' => [
                'required',
                'string',
            ],
            'label' => [
                'required',
                'string',
                Rule::unique('jobs', 'label')->ignore($this->job),
            ],
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            if (Job::where('label', Str::slug($this->label))->exists()) {
                $validator->errors()->add('contact', __('Slug already taken !'));
            }
        });
    }
}
