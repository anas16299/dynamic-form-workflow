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
        Schema::create('property_category_defaults', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('property_category_id');
            $table->json('params');
            $table->tinyInteger('status');
            $table->timestamps();

            $table->foreign('property_category_id')->references('id')->on('properties_category')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('property_category_defaults');
    }
};
