<?php

return [
    'job' => [
        'connection' => env('MODEL_SHARE_JOB_MODEL_CONNECTION', env('DB_CONNECTION')),

        'table' => env('MODEL_SHARE_JOB_TABLE_NAME', 'jobs'),

        'migration' => env('MODEL_SHARE_JOB_MIGRATION', false),

        'model' => Inisiatif\ModelShared\Models\Job::class,
    ],

    'degree' => [
        'connection' => env('MODEL_SHARE_DEGREE_MODEL_CONNECTION', env('DB_CONNECTION')),

        'table' => env('MODEL_SHARE_DEGREE_TABLE_NAME', 'degrees'),

        'migration' => env('MODEL_SHARE_DEGREE_MIGRATION', false),

        'model' => Inisiatif\ModelShared\Models\Degree::class,
    ],

    'marital_status' => [
        'connection' => env('MODEL_SHARE_MARITAL_STATUS_MODEL_CONNECTION', env('DB_CONNECTION')),

        'table' => env('MODEL_SHARE_MARITAL_STATUS_TABLE_NAME', 'marital_statuses'),

        'migration' => env('MODEL_SHARE_MARITAL_STATUS_MIGRATION', false),

        'model' => Inisiatif\ModelShared\Models\MaritalStatus::class,
    ],

    'region' => [
        'connection' => env('MODEL_SHARE_REGION_MODEL_CONNECTION', env('DB_CONNECTION')),

        'migration' => env('MODEL_SHARE_REGION_MIGRATION', false),

        'tables' => [
            'country' => env('MODEL_SHARE_REGION_COUNTRY_TABLE_NAME', 'countries'),

            'province' => env('MODEL_SHARE_REGION_PROVINCE_TABLE_NAME', 'provinces'),

            'city' => env('MODEL_SHARE_REGION_CITY_TABLE_NAME', 'cities'),

            'district' => env('MODEL_SHARE_REGION_DISTRICT_TABLE_NAME', 'districts'),

            'village' => env('MODEL_SHARE_REGION_VILLAGE_TABLE_NAME', 'villages'),
        ],

        'models' => [
            'country' => Inisiatif\ModelShared\Models\Country::class,

            'province' => Inisiatif\ModelShared\Models\Province::class,

            'city' => Inisiatif\ModelShared\Models\City::class,

            'district' => Inisiatif\ModelShared\Models\District::class,

            'village' => Inisiatif\ModelShared\Models\Village::class,
        ],
    ]
];
