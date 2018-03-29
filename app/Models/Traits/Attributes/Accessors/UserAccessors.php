<?php

namespace App\Models\Traits\Attributes\Accessors;

trait UserAccessors
{
    public function getisRootAttribute()
    {
        return $this->id == 1;
    }
}