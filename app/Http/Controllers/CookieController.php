<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class CookieController extends Controller
{
    //\
    public function setCookie(Request $request)
    {
        Cookie::queue(Cookie::forever($request->name, $request->value));
    }
}
