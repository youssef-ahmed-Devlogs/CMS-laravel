<?php

namespace App\Http\Middleware;

use App\Category;
use Closure;

class CheckCategory
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        $catsCount = Category::all()->count();

        if ($catsCount <= 0) {
            return redirect()->route('categories.create')->with('danger', 'Please Add Category First.');
        }

        return $next($request);
    }
}
