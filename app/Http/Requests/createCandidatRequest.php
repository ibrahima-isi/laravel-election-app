<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class createCandidatRequest extends FormRequest
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
            'nom' => ['required', 'regex:/^[a-zA-Z\-]+$/', 'min:2'],
            'prenom' => ['required', 'regex:/^[a-zA-Z\-]+$/', 'min:2'],
            'parti' => ['required', 'regex:/^[a-zA-Z\-]+$/', 'min:2',
                Rule::unique('candidats')->ignore($this->route()->parameter('candidat'))],
            'photo' => ['required', 'image']

        ];
    }

}
