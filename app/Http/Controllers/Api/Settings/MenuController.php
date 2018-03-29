<?php

namespace App\Http\Controllers\Api\Settings;

use App\Http\Controllers\Controller;
use App\Models\Setting\Menu;

class MenuController extends Controller
{
    public function index()
    {
        return Menu::all(['id', 'name']);
    }
}
