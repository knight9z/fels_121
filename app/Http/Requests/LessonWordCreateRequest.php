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
            'word_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'word_id.required' => trans('lesson.validate.word_id_require'),
        ];
    }
}
