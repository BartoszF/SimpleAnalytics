<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSimpleAnalyticsRequestData extends Migration
{
    public function up()
    {
        Schema::create('simple_analytics_request_data', function(Blueprint $table)
        {
            $table->string("route");
            $table->string("method");
            $table->integer("user_id");
            $table->timestamps();

            $table->index("user_id");
        });
    }

    public function down()
    {
        Schema::drop('simple_analytics_request_data');
    }
}