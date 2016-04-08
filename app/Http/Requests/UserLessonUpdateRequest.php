<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserLessonUpdateRequest extends Request
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
            'user_id' => 'require',
            'lesson_id' => 'require',
        ];
    }

    public function message()
    {
        return [
            'user_id.require' => trans('frontend/user_lesson.user_id_require'),
            'lesson_id.required' => trans('frontend/user_lesson.lesson_id_require'),
        ];
    }
}
