<?php

Route::group(['prefix' => 'analytics', 'middleware' => 'web'], function () {
    Route::get('/',
        'BartoszF\SimpleAnalytics\SimpleAnalyticsController@index');
    Route::get('/getChartData',
        'BartoszF\SimpleAnalytics\SimpleAnalyticsController@getChartData');
    Route::get('/getTopRoutes',
        'BartoszF\SimpleAnalytics\SimpleAnalyticsController@getTopRoutes');
});