<?php

namespace App\Models\Admin\Database;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Model;

class Administrator extends Model implements AuthenticatableContract
{
    use Authenticatable;

    protected $fillable = ['username', 'password', 'name', 'api_token'];

    /**
     * Create a new Eloquent model instance.
     *
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        $this->table = config('admin.database.users_table');

        parent::__construct($attributes);
    }

    public function parent()
    {
        return $this->hasOne(Administrator::class, 'id', 'parent_id');
    }

    /**
     * A User belongs to many menus.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function menus()
    {
        $pivotTable = config('admin.database.admin_menu_table');

        return $this->belongsToMany(Menu::class, $pivotTable, 'admin_user_id', 'menu_id');
    }

    /**
     * A User belongs to many roles.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles()
    {
        $pivotTable = config('admin.database.role_users_table');

        return $this->belongsToMany(Role::class, $pivotTable, 'user_id', 'role_id');
    }

    /**
     * Check if user has permission.
     *
     * @param $permission
     *
     * @return bool
     */
    public function can($permission)
    {
        foreach ($this->roles as $role) {
            if ($role->can($permission)) {
                return true;
            }
        }

        return false;
    }

    /**
     * Check if user has no permission.
     *
     * @param $permission
     *
     * @return bool
     */
    public function cannot($permission)
    {
        return !$this->can($permission);
    }

    /**
     * Check if user is $roles.
     *
     * @param $roles
     *
     * @return mixed
     */
    public function isRole($roles)
    {
        if (is_string($roles)) {
            $roles = [$roles];
        }

        return $this->roles()->whereIn('slug', $roles)->exists();
    }

    /**
     * If visible for roles.
     *
     * @param $roles
     *
     * @return bool
     */
    public function visible($roles)
    {
        if ($this->isRole('administrator')) {
            return true;
        }

        if (empty($roles)) {
            return false;
        }

        $roles = array_column($roles, 'slug');

        if ($this->isRole($roles) || $this->isRole('administrator')) {
            return true;
        }

        return false;
    }

    public function hasMenu($menu)
    {
        $result = false;
        if (is_string($menu)) {
            $checkMenus = [$menu];
        }

        $this->roles()->each(function($item) use ($checkMenus, &$result) {
            if ($item->menus()->whereIn('uri', $checkMenus)->exists()){
                $result = true;
            }
        });

        if ($this->menus()->whereIn('uri', $checkMenus)->exists()){
            $result = true;
        }

        return $result;
    }
}
