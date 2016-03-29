<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Input;

class UserUpdateRequest extends Request
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
        $userId = Input::get('id');
        $userConfig = config('constants.user');
        return [
            'email' => 'required|email|unique:users,email,' . $userId,
            'name' => 'required',
            'role' => 'required',
            'password' => 'between:' . $userConfig['password_min_length'] . ',' . $userConfig['password_max_length'] .'',
            'image' => 'mimes:jpeg,png',
        ];
    }

    public function messages()
    {
        return [
            'image.mimes' => trans('user.register.avatar.image_mimes'),
            'name.required' => trans('user.register.name.name_required'),
            'role.required' => trans('user.register.role.role_required'),
            'email.required' => trans('user.register.email.email_required'),
            'email.email' => trans('user.register.email.email.email_email'),
            'email.unique' => trans('user.register.email.mail_exist'),
            'password.between' => trans('user.register.password.password_between')
        ];
    }
}
