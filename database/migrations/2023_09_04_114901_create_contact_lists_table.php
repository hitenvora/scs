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
        Schema::create('contact_lists', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sign_up_id');
            $table->foreign('sign_up_id')
                ->references('id')
                ->on('sign_up')
                ->onDelete('cascade');
            $table->string('person_name');
            $table->bigInteger('mobile_no');
            $table->string('email_id');
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
        Schema::dropIfExists('contact_lists');
    }
};
