<?php

namespace App\Models\Auth;

use App\Models\Traits\Fetchable;
use Spatie\Permission\Models\Role as BaseRole;

class Role extends BaseRole
{
    use Fetchable;
}