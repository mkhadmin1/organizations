<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckClientHasApiToken
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure(Request): (Response) $next
     * @return Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        $token = config('api_tokens.token');

        if ($request->header('Api-Token' !== $token)) {
            return \response()->json([
                'message' => 'Forbidden!'
            ], Response::HTTP_FORBIDDEN);
        }
        return $next($request);
    }
}
