<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Support\Facades\Log;

class SessionLoginRequest extends Request
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
                'email' => 'required|email',
                'password' => 'required|between:' . $userConfig['password_min_length'] . ',' . $userConfig['password_min_length'],
        ];
    }

    public function messages()
     {
         return [
             'email.required' => trans('user.login.email.email_required'),
             'email.email' => trans('user.login.email.email.email_email'),
             'password.required' => trans('user.login.password.password_required'),
             'password.between' => trans('user.login.password.password_between'),
         ];
     }

}
