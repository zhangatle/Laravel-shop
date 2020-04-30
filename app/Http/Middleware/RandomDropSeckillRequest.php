<?php

namespace App\Http\Middleware;

use App\Exceptions\InvalidRequestException;
use Closure;

class RandomDropSeckillRequest
{
    /**
     * @param $request
     * @param Closure $next
     * @param $percent
     * @return mixed
     * @throws InvalidRequestException
     */
    public function handle($request, Closure $next, $percent)
    {
        if(random_int(0, 100) < (int)$percent) {
            throw new InvalidRequestException('参与用户过多，请稍后再试', 403);
        }
        return $next($request);
    }
}
