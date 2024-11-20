<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

class GetController extends APIController
{
    public function setting(Request $request, $key)
    {
        $response = [
            'key' => $key,
            'value' => __setting($key, null)
        ];

        return $this->sendSuccess($response, 'Setting retrieved successfully');
    }
}
