<?php

return [
    'validate' => [
        'following_id' => [
            'require' => 'Following id must require',
            'exists' => 'Following id must exist',
        ],
        'follower_id' => [
            'require' => 'Following id must require',
            'exists' => 'Following id must exist',
        ],
        'duplicate' => 'You can not follower yourself'
    ]

];