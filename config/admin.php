<?php

return [
    'name' => '線上安太歲',
    'logo-mini' => '廟',
    'logo-lg'   => '好廟網點燈平台',
    'prefix'    => 'admin',

    'directory' => app_path('Admin'),

    'title'  => 'Admin',

    'auth' => [
        'driver'   => 'session',
        'provider' => '',
        'model'    => App\Models\Admin\Database\Administrator::class,
    ],

    'upload'  => [
        'image'  => base_path('public/upload/image'),
        'file'   => base_path('public/upload/file'),
    ],

    'database' => [
        'users_table' => 'admin_users',
        'users_model' => App\Models\Admin\Database\Administrator::class,

        'roles_table' => 'admin_roles',
        'roles_model' =>  App\Models\Admin\Database\Role::class,

        'permissions_table' => 'admin_permissions',
        'permissions_model' =>  App\Models\Admin\Database\Permission::class,

        'menu_table'  => 'admin_menu',
        'menu_model'  =>  App\Models\Admin\Database\Menu::class,

        'role_users_table'       => 'admin_role_users',
        'role_permissions_table' => 'admin_role_permissions',
        'role_menu_table'        => 'admin_role_menu',
        'admin_menu_table'       => 'admin_user_menu',
    ],

    /*
    |---------------------------------------------------------|
    | SKINS         | skin-blue                               |
    |               | skin-black                              |
    |               | skin-purple                             |
    |               | skin-yellow                             |
    |               | skin-red                                |
    |               | skin-green                              |
    |---------------------------------------------------------|
     */
    'skin'    => 'skin-red',

    /*
    |---------------------------------------------------------|
    |LAYOUT OPTIONS | fixed                                   |
    |               | layout-boxed                            |
    |               | layout-top-nav                          |
    |               | sidebar-collapse                        |
    |               | sidebar-mini                            |
    |---------------------------------------------------------|
     */
    'layout'  => ['fixed', 'sidebar-mini'],

    'version'   => '1.0',

    'google_map_key' => 'AIzaSyCUSk-5eNj1T5RH1U6tWPuqzA5fVMv37f0'
];
