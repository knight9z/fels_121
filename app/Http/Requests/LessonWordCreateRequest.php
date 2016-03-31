<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class LessonWordCreateRequest extends Request
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
            'lesson_id'=> 'required|exists:lessons,id',
            'word_id' => 'required|exists:lessons,id',
        ];
    }

    public function messages()
    {
        return [
            'category_id.required' => trans('lesson.validate.category_id_require'),
            'category_id.exists' => trans('lesson.validate.category_id_exists'),
            'title.required' => trans('lesson.validate.title_require'),
        ];
    }
}
