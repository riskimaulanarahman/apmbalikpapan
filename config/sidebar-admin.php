<?php

return [

    /*
    |--------------------------------------------------------------------------
    | View Storage Paths
    |--------------------------------------------------------------------------
    |
    | Most templating systems load templates from disk. Here you may specify
    | an array of paths that should be checked for your views. Of course
    | the usual Laravel view path has already been registered for you.
    |
    */

    'menu' => [
            [
                'icon' => 'fa fa-th-large',
                'title' => 'Dashboard',
                'url' => '/admin/dashboard-admin',
            
            ],
            [
                'icon' => 'fa fa-file',
                'title' => 'Laporan',
                'url' => '/admin/laporan',
            
            ],
            [
                'icon' => 'fa fa-cogs',
                'title' => 'Manage',
                'url' => 'javascript:;',
                'caret' => true,
                'sub_menu' => [
                    [
                        'url' => '/admin/master-user',
                        'title' => 'Users'
                    ]
                ]
            ],
            // [
            //     'icon' => 'fa fa-folder-open',
            //     'title' => 'Data Master',
            //     'url' => 'javascript:;',
            //     'caret' => true,
            //     'sub_menu' => [
            //         [
            //             'url' => '/admin/master-rt',
            //             'title' => 'RT'
            //         ],
            //     ]
            // ],

    ]
];