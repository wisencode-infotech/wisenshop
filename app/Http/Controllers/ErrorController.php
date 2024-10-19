<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ErrorController extends Controller
{
    public function index(Request $request, $code = 404)
    {
        abort($code);
    }
}
