<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class WordCreateRequest extends Request
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
    public function rules(  )
    {
        return [
            'category_id' => 'required|exists:categories,id',
            'content' => 'required|unique:words,content',
            'content_answer' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'category_id.required' => trans('word.validate.category_id_require'),
            'category_id.exists' => trans('word.validate.category_id_exists'),
            'content_answer.required' => trans('word.validate.content_answer_require'),
            'note_answer.required' => trans('word.validate.note_answer_require'),
        ];
    }
}
