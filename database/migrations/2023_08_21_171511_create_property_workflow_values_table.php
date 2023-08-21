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
        Schema::create('workflow_property_values', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('workflow_property_id');
            $table->string('value');
            $table->timestamps();

            $table->foreign('workflow_property_id')->references('id')->on('workflow_properties')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('property_workflow_values');
    }
};
