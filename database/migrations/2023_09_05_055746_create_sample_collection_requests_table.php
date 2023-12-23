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
        Schema::create('sample_collection_requests', function (Blueprint $table) {
            $table->id();
            $table->dateTime('sample_date');
            $table->string('sample_no');
            $table->string('company_name');
            $table->string('mobile');
            $table->longText('address');
            $table->string('image');
            $table->unsignedBigInteger('route_lists_id')->nullable();
            $table->unsignedBigInteger('sign_up_id');
            $table->tinyInteger('sample_collected')->default(0)->comment('0=>No, 1=>Collected, 2=>Not Available');
            $table->unsignedBigInteger('user_id')->nullable();
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
        Schema::dropIfExists('sample_collection_requests');
    }
};
