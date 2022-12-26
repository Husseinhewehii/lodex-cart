<?php

namespace App\Http\Middleware;

use App\Models\Category;
use Closure;

class Frontend
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $defaultCategory = Category::query()->where('parent_id', '=', null)->first();

        if (!session()->get('main_category')) {
            session()->put('main_category', $defaultCategory);
        }

        return $next($request);
    }
}
