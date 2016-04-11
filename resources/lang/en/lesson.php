<?php

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

    'validate' => [
        'title_require' => 'Title is require',
        'title_unique' => 'Title is exist',
        'image_require' => 'Image is require',
        'image_mimes' => 'Images must be of the form jpeg,png',
        'category_id_exists' => 'Category is do not exist',
        'category_id_require' => 'Category is require',
        'word_id_require' => 'Word is require',
    ],

    'throttle' => 'Too many login attempts. Please try again in :seconds seconds.',
];
