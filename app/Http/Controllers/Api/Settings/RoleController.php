<?php

namespace App\Http\Controllers\Api\Settings;

use App\Http\Controllers\Controller;
use App\Searchables\Settings\SearchableRole;

class RoleController extends Controller
{
    public function index(SearchableRole $role)
    {
        return $role->search();
    }
}
