<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserAccess
{

     public function handle(Request $request, Closure $next, $level): Response
     {
        // if(auth()->user()->level == $level){
        //     return $next($request);
        // }

        $levelsArray = explode('|', $level);
        if (in_array(auth()->user()->level, $levelsArray)) {
            return $next($request);
        }
        return response()->json(['You do not have permission to access for this page.']);
     }
}
