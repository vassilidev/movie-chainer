<?php

namespace App\Http\Requests;

use App\Models\Job;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class FilmRequest extends FormRequest
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
        return [
            'title' => [
                'required',
                'string',
            ],
            'year' => [
                'required',
                'int',
                'min:1895',
                'max:3000',
            ],
            'contacts' => [
                'array',
            ],
            'contacts.*' => [
                Rule::exists('contacts', 'id'),
            ],
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            if (!empty($this->contacts)) {
                foreach ($this->contacts as $jobID => $contact) {
                    if (!Job::where('id', $jobID)->exists()) {
                        $validator->errors()->add('contact', __('Job do not exist !'));
                    }
                }
            }
        });
    }

}
