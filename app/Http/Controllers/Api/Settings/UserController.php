<?php

namespace App\Http\Controllers\Api\Settings;

use App\Http\Controllers\Controller;
use App\Searchables\Settings\SearchableUser;

class UserController extends Controller
{
    public function index(SearchableUser $user)
    {
        return $user->search();
    }
}
