<?php

return [
    'tables' => [
        'job' => env('MODEL_SHARED_TABLE_JOB', 'jobs'),

        'degree' => env('MODEL_SHARED_TABLE_DEGREE', 'degrees'),

        'country' => env('MODEL_SHARED_TABLE_COUNTRY', 'countries'),

        'province' => env('MODEL_SHARED_TABLE_PROVINCE', 'provinces'),

        'city' => env('MODEL_SHARED_TABLE_CITY', 'cities'),

        'district' => env('MODEL_SHARED_TABLE_DISTRICT', 'districts'),

        'village' => env('MODEL_SHARED_TABLE_VILLAGE', 'villages'),
    ]
];
