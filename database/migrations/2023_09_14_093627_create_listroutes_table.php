<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('listroutes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sample_collection_requests_id');
            $table->dateTime('sample_collected_date');
            $table->unsignedBigInteger('route_lists_id');
            $table->string('document');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('listroutes');
    }
};
