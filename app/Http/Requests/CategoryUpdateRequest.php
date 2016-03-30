<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Input;

class CategoryUpdateRequest extends Request
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
        $categoryLocaleId = Input::get('locale_id');

        return [
            'image' => 'mimes:jpeg,png',
            'title' => 'required|unique:category_locales,title,'. $categoryLocaleId,
        ];
    }


    public function messages()
    {
        return [
            'image.mimes' => trans('category.validate.image_mimes'),
            'title.required' => trans('category.validate.title_require'),
            'title.unique' => trans('category.validate.title_unique'),
        ];
    }
}
