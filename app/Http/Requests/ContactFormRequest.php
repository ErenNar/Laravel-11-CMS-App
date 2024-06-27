<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactFormRequest extends FormRequest
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

            'c_fname' => 'required|string|min:3',
            'c_lname' => 'required|string|min:3',
            'c_email' => 'required|email',
            'c_subject' => 'required',
            'c_message' => 'required'

        ];
    }
}
