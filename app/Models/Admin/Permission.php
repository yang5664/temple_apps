<?php

namespace App\Models\Admin;

use Encore\Admin\Facades\Admin;
use Illuminate\Support\Facades\Auth;

class Permission
{
    /**
     * Check Has Menu.
     *
     * @param $menu
     */
    public static function hasMenu($menu)
    {
        if (!Auth::guard('admin')->user()->hasMenu($menu)) {
            static::error();
        }
    }
    /**
     * Check permission.
     *
     * @param $permission
     */
    public static function check($permission)
    {
        if (Auth::guard('admin')->user()->cannot($permission)) {
            static::error();
        }
    }

    /**
     * Roles allowed to access.
     *
     * @param $roles
     */
    public static function allow($roles)
    {
        if (!Auth::guard('admin')->user()->isRole($roles)) {
            static::error();
        }
    }

    /**
     * Roles denied to access.
     *
     * @param $roles
     */
    public static function deny($roles)
    {
        if (Auth::guard('admin')->user()->isRole($roles)) {
            static::error();
        }
    }

    /**
     * Send error response page.
     *
     * @param \Exception $e
     */
    protected static function error()
    {
        $content = Admin::content(function ($content) {
            $content->body(view('admin::deny'));
        });

        response($content)->send();
        exit;
    }
}
