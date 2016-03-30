<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Support\Facades\Input;

class LessonUpdateRequest extends Request
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
            'category_id' => 'required|exists:categories,id',
            'title' => 'required',
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
