<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CertificateUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
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
            'number' => ['sometimes', 'string', 'max:50'],
            'name' => ['sometimes', 'string'],
            'whom' => ['sometimes', 'string'],
            'date' => ['sometimes', 'date'],
            'file' => [
                'file',
                'sometimes',
                'mimes:jpg,jpeg,png,pdf',
                'max:52428800'
            ],
        ];
    }
}
