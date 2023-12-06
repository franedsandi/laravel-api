<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TypeRequest extends FormRequest
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
            'name' => ['required', 'min:3', 'max:500'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'You must insert the name of the type.',
            'name.min' => 'The name of the type. must have at least :min characters.',
            'name.max' => 'The name of the type. can have at most :max characters.',

        ];
    }
}