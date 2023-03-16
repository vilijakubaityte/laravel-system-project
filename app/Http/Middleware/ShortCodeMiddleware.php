<?php

namespace App\Http\Middleware;

use App\Models\Owners;
use App\Models\ShortCode;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ShortCodeMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response=$next($request);
        $content=$response->getContent();

        foreach (ShortCode::all() as $code) {
            $content=preg_replace('/\b('.$code->shortcode.')\b/i', $code->replace,$content);
        }
        $response->setContent($content);
        return $response;
    }
}
