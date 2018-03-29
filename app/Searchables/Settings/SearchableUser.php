<?php

namespace App\Searchables\Settings;

use App\Searchables\BaseSearchable;
use App\User;

class SearchableUser extends BaseSearchable
{

    /**
     * @return string
     */
    protected function model()
    {
        return User::class;
    }

    /**
     * @return array
     */
    protected function searchableFields()
    {
        return [
            'name', 'username', 'email', 'created_at', 'updated_at'
        ];
    }
}