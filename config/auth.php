<?php

return [
    'defaults' => [
        'guard'     => 'customer',
        'passwords' => 'customers',
    ],

    'guards' => [
        'web' => [  // Dodajemy guard 'web'
            'driver'   => 'session',
            'provider' => 'users',  // Możesz go zostawić jako 'users', nawet jeśli nie używasz tej nazwy.
        ],

        'customer' => [
            'driver'   => 'session',
            'provider' => 'customers',
        ],

        'admin' => [
            'driver'   => 'session',
            'provider' => 'admins',
        ],
    ],

    'providers' => [
        'users' => [  // Dodajemy provider 'users', aby pasował do guardu 'web'
            'driver' => 'eloquent',
            'model'  => App\Models\User::class,
        ],

        'customers' => [
            'driver' => 'eloquent',
            'model'  => Webkul\Customer\Models\Customer::class,
        ],

        'admins' => [
            'driver' => 'eloquent',
            'model' => Webkul\User\Models\Admin::class,        ],
    ],

    'passwords' => [
        'customers' => [
            'provider' => 'customers',
            'table'    => 'customer_password_resets',
            'expire'   => 60,
            'throttle' => 60,
        ],

        'admins' => [
            'provider' => 'admins',
            'table'    => 'admin_password_resets',
            'expire'   => 60,
            'throttle' => 60,
        ],
    ],
];
