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
            'email_required' => 'Require Email ',
            'email_email' => 'Invalid Email'
        ],
        'password' => [
            'password_required' => 'Require Password ',
            'password_between' => 'Password have ' . $userConfig['password_min_length'] . ' to ' . $userConfig['password_max_length'] . ' characters'
        ],
        'login_failed' => 'Email or Password wrong !'
    ],

    'register' => [
        'name' => ['email_required' => 'Require Name'],
        'avatar' => [
            'image_require' => 'Require avatar' ,
            'image_mimes'  => 'Images must be of the form jpeg,png'
        ],
        'email' => [
            'email_required' => 'Require Email ',
            'mail_exist' => 'Email is existed ',
            'email_email' => 'Invalid Email'
        ],
        'password' => [
            'password_required' => 'Require password ',
            'password_between' => 'Password have ' . $userConfig['password_min_length'] . ' to ' . $userConfig['password_max_length'] . ' characters',
            'password_repeat_required' => 'Require password repeat'
        ],
    ],
    'destroy' => [
        'remove_mine' => 'You can not remove yourself '
    ],
    'role' => [
        'admin' => 'Admin',
        'member' => 'Member',
    ]

];
