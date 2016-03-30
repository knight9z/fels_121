<?php

namespace App\Http\Requests;

class CategoryCreateRequest extends Request
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
            'image' => 'required|mimes:jpeg,png',
            'title' => 'required|unique:category_locales,title',
        ];
    }


    public function messages()
    {
        return [
            'image.required' => trans('category.validate.image_require'),
            'image.mimes' => trans('category.validate.image_mimes'),
            'title.required' => trans('category.validate.title_require'),
            'title.unique' => trans('category.validate.title_unique'),
        ];
    }
}
