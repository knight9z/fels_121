<?php

namespace App\Http\Requests;

class MemberCreateRequest extends Request
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
        $userConfig = config('constants.user');
        return [
            'email' => 'required|email|unique:users,email',
            'name' => 'required',
            'password' => 'required|between:' . $userConfig['password_min_length'] . ',' . $userConfig['password_max_length'],
            'image' => 'required|mimes:jpeg,png',
            'password_repeat' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'image.required' => trans('user.register.avatar.image_require'),
            'image.mimes' => trans('user.register.avatar.image_mimes'),
            'name.required' => trans('user.register.name.name_required'),
            'email.required' => trans('user.register.email.email_required'),
            'email.email' => trans('user.register.email.email.email_email'),
            'email.unique' => trans('user.register.email.mail_exist'),
            'password.required' => trans('user.register.password.password_required'),
            'password_repeat.required' => trans('user.register.password.password_repeat_required'),
            'password.between' => trans('user.register.password.password_between')
        ];
    }
}
