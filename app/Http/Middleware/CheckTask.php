<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckTask
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $task = $request->route('task');

        if ($task && auth('employees')->id() !== $task->employee_id) {
            abort(403, 'Unauthorized action.');
        }
        return $next($request);
    }
}
