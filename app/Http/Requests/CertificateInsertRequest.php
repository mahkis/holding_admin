<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CertificateInsertRequest extends FormRequest
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
            'number' => ['required', 'string', 'max:50'],
            'name' => ['required', 'string'],
            'whom' => ['required', 'string'],
            'date' => ['required', 'date'],
            'file' => [
                'file',
                'sometimes',
                'mimes:jpg,jpeg,png,pdf,doc,docx',
                'max:52428800'
            ],
        ];
    }
}