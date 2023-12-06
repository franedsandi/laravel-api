<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
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
            'title' => ['required', 'min:3', 'max:500'],
            'description' => ['required', 'min:3', 'max:500'],
            'publication_date' => ['required'],
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'You must insert a title.',
            'title.min' => 'The title must have at least :min characters.',
            'title.max' => 'The title can have at most :max characters.',
            'description.required' => 'You must insert a description.',
            'description.min' => 'The description must have at least :min characters.',
            'description.max' => 'The description can have at most :max characters.',
            'publication_date.required' => 'You must insert a publication date date.',
        ];
    }
}

