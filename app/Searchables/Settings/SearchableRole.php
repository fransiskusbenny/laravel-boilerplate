<?php

namespace App\Searchables\Settings;

use App\Models\Auth\Role;
use App\Searchables\BaseSearchable;

class SearchableRole extends BaseSearchable
{

    /**
     * @return string
     */
    protected function model()
    {
        return Role::class;
    }

    /**
     * @return array
     */
    protected function searchableFields()
    {
        return [
            'name'
        ];
    }
}