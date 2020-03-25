<?php


namespace App\Http\Service;

use Illuminate\Support\Facades\Auth;


class PostsService
{

    public static function business($request)
    {
        //

        if (!Auth::check()) {
            // The user is logged in...
//            \App\Http\Middleware\Authenticate::redirectTo($$request);
        }
    }
}
