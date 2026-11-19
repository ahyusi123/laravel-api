<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;

class APIController extends Controller
{
    public function include(string $relationship): bool
    {
        $param = request()->query('include');

        if (! is_string($param) || $param === '') {
            return false;
        }

        $includeValues = explode(',', strtolower($param));

        return in_array(strtolower($relationship), $includeValues, true);
    }
}