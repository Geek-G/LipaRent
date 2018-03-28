<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PropertyRelationships extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('properties', function (Blueprint $table) {
            $table->integer('landlord_id')->unsigned()->after('id');
            $table->foreign('landlord_id')->references('id')->on('landlords')->onDelete('cascade');
            $table->integer('street_id')->unsigned()->after('landlord_id');
            $table->foreign('street_id')->references('id')->on('streets');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
