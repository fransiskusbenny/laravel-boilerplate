<?php

namespace App\Models\Auth;

use App\Models\Traits\Fetchable;
use Spatie\Permission\Models\Permission as BasePermission;

class Permission extends BasePermission
{
    use Fetchable;
}