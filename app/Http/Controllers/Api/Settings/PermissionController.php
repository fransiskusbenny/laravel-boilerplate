<?php

namespace App\Http\Controllers\Api\Settings;

use App\Http\Controllers\Controller;
use App\Searchables\Settings\SearchablePermission;

class PermissionController extends Controller
{

    public function index(SearchablePermission $permission)
    {
        return $permission->search();
    }
}
