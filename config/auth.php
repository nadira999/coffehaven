<?php

return [

    'defaults' => [
        'guard' => 'owner',
        'passwords' => 'owner',
    ],

    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],

        'owner' => [
            'driver' => 'session',
            'provider' => 'owner',
        ],

        'pelanggan' => [
            'driver' => 'session',
            'provider' => 'pelanggan',
        ],
    ],

    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => App\Models\User::class,
        ],

        'owner' => [
            'driver' => 'eloquent',
            'model' => App\Models\Owner::class,
        ],

        'pelanggan' => [
            'driver' => 'eloquent',
            'model' => App\Models\Pelanggan::class,
        ],
    ],

    'passwords' => [
        'owner' => [
            'provider' => 'owner',
            'table' => 'password_reset_tokens',
            'expire' => 60,
            'throttle' => 60,
        ],

        'pelanggan' => [
            'provider' => 'pelanggan',
            'table' => 'password_reset_tokens',
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    'password_timeout' => 10800,

];