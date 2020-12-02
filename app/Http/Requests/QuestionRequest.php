<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuestionRequest extends FormRequest
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
            'question.question' => 'required',
            'answers.*.answer' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'question.question.required' => ' Please Enter question',
            'answers.0.answer.required' => 'Enter answer 1',
            'answers.1.answer.required' => 'Enter answer 2',
            'answers.2.answer.required' => 'Enter answer 3',
            'answers.3.answer.required' => 'Enter answer 4',
        ];
    }
}
