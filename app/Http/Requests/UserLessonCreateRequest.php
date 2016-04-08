<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserLessonCreateRequest extends Request
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
            'user_id' => 'required',
            'lesson_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'user_id.required' => trans('frontend/user_lesson.user_id_required'),
            'lesson_id.required' => trans('frontend/user_lesson.lesson_id_required'),
        ];
    }
}
