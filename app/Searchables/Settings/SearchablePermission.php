<?php

namespace App\Searchables\Settings;

use App\Models\Auth\Permission;
use App\Searchables\BaseSearchable;

class SearchablePermission extends BaseSearchable
{

    protected function model()
    {
        return Permission::class;
    }

    protected function searchableFields()
    {
        return [
            'name'
        ];
    }

    protected function apply()
    {
        return $this->model->withCount('roles', 'users');
    }
}