<?php

namespace App\Models\Traits;

use App\Models\Traits\Attributes\Accessors\UserAccessors;

trait UserTrait
{
    use UserAccessors;

    public function isAdmin()
    {
        return $this->id == 1 || $this->hasAnyRole(['admin', 'root']);
    }
}