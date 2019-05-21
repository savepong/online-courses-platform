<?php
return [
    'version' => '1.0',
    'media' => [
        'directory' => 'media/',
        'image' => [
            'width' => 1200,
            'height' => 630,
            'thumbnail' => [
                'width' => 600,
                'height' => 315,
            ]
        ]
    ],
    'image' => [
        'directory' => 'media/images/',
        'width' => 1200,
        'height' => 630,
        'thumbnail' => [
            'width' => 600,
            'height' => 315,
        ]
    ],
    'file' => [
        'directory' => 'media/files/',
    ],
    'default_user_id' => 1,
    'default_category_id' => 1,

    'website' => [
        'domain' => env('APP_NAME', 'OnlineCourses'),
        'url' => env('APP_URL' ,'https://www.ideagital.com/courses')
    ]
];