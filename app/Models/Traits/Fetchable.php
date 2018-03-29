<?php

namespace App\Models\Traits;

use Illuminate\Http\Request;

trait Fetchable
{
    public function scopeFetch($query, Request $request)
    {
        if ($sort = $request->get('sort')) {
            list($sortCol, $sortDir) = explode('|', $sort);

            $query->orderBy($sortCol, $sortDir);
        }

        if ($this->shouldPaginate($request)) {
            return $query->paginate($this->perPage($request));
        }

        return $query->get();
    }

    private function shouldPaginate(Request $request)
    {
        return boolval($request->get('pagination'));
    }

    private function perPage(Request $request)
    {
        return $request->get('per_page');
    }
}