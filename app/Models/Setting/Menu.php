<?php

namespace App\Models\Setting;

use App\Models\Auth\Permission;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = [
        'name', 'icon', 'url', 'order'
    ];

    protected $with = ['permission'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function parent ()
    {
        return $this->belongsTo(static::class, 'parent_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function childs ()
    {
        return $this->hasMany(static::class, 'parent_id')
            ->with('childs');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function permission ()
    {
        return $this->belongsTo(Permission::class);
    }

    /**
     * @param $value
     */
    public function setIconAttribute ($value)
    {
        $this->attributes['icon'] = $value ?? config('menu.default_icon');
    }

    /**
     * @param $value
     */
    public function setUrlAttribute ($value)
    {
        $this->attributes['url'] = $value ?? config('menu.default_url');
    }

    /**
     * @param $value
     */
    public function setOrderAttribute ($value)
    {
        $this->attributes['order'] = $value ?? config('menu.default_order');
    }

    /**
     * Determinte if user can access current menu
     *
     * @param User $user
     * @return bool
     */
    public function accessibleBy (User $user)
    {
        if ($user->isAdmin()) {
            return true;
        }

        if ($this->childs()->exists()) {
            return !$this->childs->map->accessibleBy($user)
                ->every(function ($accessbily) {
                    return !$accessbily;
                });
        }

        if ($permission = $this->permission()->exists()) {
            return $user->hasPermissionTo($permission->name);
        }

        return true;
    }

    /**
     * Add childs to current menu
     *
     * @param array ...$childs
     * @return $this|array
     */
    public function addChild (...$childs)
    {
        if ($childs instanceof Menu) {
            return $childs->setParent($this);
        }

        foreach ($childs as $child) {
            $child->setParent($this);
        }

        return $childs;
    }

    /**
     * Set current menu as parent menu
     *
     * @param $parent
     * @return $this
     */
    public function setParent ($parent)
    {
        $this->parent()->associate($parent)->save();

        return $this;
    }
}
