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
        Schema::create('workflow_properties', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('property_category_id');
            $table->unsignedBigInteger('property_id');
            $table->unsignedBigInteger('workflow_id');
            $table->unsignedBigInteger('workflow_id');
            $table->unsignedBigInteger('signer_id');
            $table->string('x');
            $table->string('y');
            $table->string('label');
            $table->tinyInteger('status');
            $table->timestamps();

            $table->foreign('property_category_id')->references('id')->on('properties_category')->onDelete('cascade');
//            $table->foreign('workflow_id')->references('id')->on('workflow')->onDelete('cascade');
//            $table->foreign('signer_id')->references('id')->on('signers')->onDelete('cascade');
            $table->foreign('property_id')->references('id')->on('properties')->onDelete('cascade');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('workflow_properties');
    }
};
