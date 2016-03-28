<?php
$userConfig = config('constants.user');

return [

    /*
    |--------------------------------------------------------------------------
    | Authentication Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used during authentication for various
    | messages that we need to display to the user. You are free to modify
    | these language lines according to your application's requirements.
    |
    */

    'login' => [
        'email' => [
            'email_required' => 'Thiếu Email ',
            'email_email' => 'Mail nhập không đúng'
        ],
        'password' => [
            'password_required' => 'Thiếu mật khẩu ',
            'password_between' => 'Mật khẩu có từ ' . $userConfig['password_min_length'] . ' đến ' . $userConfig['password_max_length'] . '  ký tự'
        ],
        'login_failed' => 'Email hoặc password không đúng.'
    ],

    'register' =>[
        'name' => ['name_required' => 'Thiếu tên'],

        'avatar' => [
            'image_require' => 'Thiếu avatar' ,
            'image_mimes'  => 'Avatar phai là kiểu png hoặc jpg'
        ],
        'email' => [
            'email_required' => 'Thiếu Email ',
            'email_email' => 'Mail nhập không đúng',
            'mail_exist' => 'Email đã được đăng ký'
        ],
        'password' => [
            'password_required' => 'Thiếu mật khẩu ',
            'password_repeat_required' => 'Phải nhắc lại mật khẩu',
            'password_between' => 'Password có từ ' . $userConfig['password_min_length'] . '  đến ' . $userConfig['password_max_length'] . '  ký tự'
        ],
        'role' => [
            'role_require'  => 'Phải cấp quyền cho tài khoản'
        ],
        'compare_password' => 'Nhấp lại mật khẩu không đúng',
        'register_failed' => 'Có lỗi vui lòng thử lại.',
    ],

];
