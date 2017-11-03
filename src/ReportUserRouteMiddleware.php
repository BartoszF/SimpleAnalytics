<?php

namespace BartoszF\SimpleAnalytics;

use Carbon\Carbon;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReportUserRouteMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     * @throws \Exception
     */
    public function handle($request, Closure $next)
    {
        $user = Auth::user();
        $route = $request->getRequestUri();
        $method = $request->getMethod();
        $date = Carbon::now();

        if($user != null)
        {

            DB::beginTransaction();
            try {
                $data = array("user_id" => $user->id, "route" => $route, "method" => $method, "created_at" => $date);
                DB::table("simple_analytics_request_data")->insert($data);
            } catch (Exception $e) {
                DB::rollBack();

                throw $e;
            }

            DB::commit();
        }

        return $next($request);
    }
}
