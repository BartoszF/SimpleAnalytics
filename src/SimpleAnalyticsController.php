<?php

namespace BartoszF\SimpleAnalytics;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SimpleAnalyticsController extends Controller
{

    public function index()
    {
        echo view("simple_analytics::dashboard");
    }

    public function getChartData(Request $request)
    {
        $timestamp = $request->input("timestamp");
        $seconds = $request->input("seconds");
        $seconds = intval($seconds);
        $date = Carbon::parse($timestamp);
        $old_date = Carbon::parse($timestamp)->subSeconds($seconds);

        $routes = DB::table("user_report_detail")->where([["created_at",">=",$old_date],["created_at","<=",$date]])->get();
        $routes = count($routes);

        return $routes;
    }

}