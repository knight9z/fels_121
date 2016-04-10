<?php

return [
    'validate' => [
        'following_id' => [
            'require' => 'Bắt buộc phải có người được theo dõi',
            'exists' => 'Người được theo dõi phải tồn tại',
        ],
        'follower_id' => [
            'require' => 'Bắt buộc phải có người theo dõi',
            'exists' => 'Người theo dõi phải tồn tại',
        ],
        'duplicate' => 'You can not follower yourself'
    ]

];