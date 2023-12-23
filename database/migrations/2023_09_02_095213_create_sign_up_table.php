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
        Schema::create('sign_up', function (Blueprint $table) {
            $table->id();
            $table->string('cust_name');
            $table->string('city');
            $table->longText('address');
            $table->string('gst_no');
            $table->unsignedBigInteger('sample_frequencies_id');
            $table->foreign('sample_frequencies_id')
                ->references('id')
                ->on('sample_frequencies')
                ->onDelete('cascade');
            $table->longText('g_map_location');
            $table->string('person_name')->nullable();
            $table->bigInteger('mobile_no')->nullable();
            $table->string('email_id')->nullable();
            $table->tinyInteger('is_active')->default(1)->comment('1: active, 0: inactive');
            $table->bigInteger('created_by')->nullable();
            $table->bigInteger('updated_by')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('sign_up');
    }
};
