<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TechnologyRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['required', 'min:3', 'max:500'],
            'description' => ['required', 'min:3', 'max:500'],
            'level' => ['required', 'numeric', 'between:1,5'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'You must insert a name.',
            'name.min' => 'The name must have at least :min characters.',
            'name.max' => 'The name can have at most :max characters.',
            'description.required' => 'You must insert a description.',
            'description.min' => 'The description must have at least :min characters.',
            'description.max' => 'The description can have at most :max characters.',
            'level.required' => 'You must insert a level.',
            'level.numeric' => 'The level must be a numeric value.',
            'level.between' => 'The level must be between :min and :max.',
        ];
    }
}
