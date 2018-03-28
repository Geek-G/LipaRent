<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class HouseRelationships extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('houses', function (Blueprint $table) {
            $table->integer('house_type_id')->unsigned()->after('id');
            $table->foreign('house_type_id')->references('id')->on('house_types');
            $table->integer('property_id')->unsigned()->after('id');
            $table->foreign('property_id')->references('id')->on('properties')->onDelete('cascade');
            $table->integer('tenant_id')->unsigned()->after('house_type_id');
            $table->foreign('tenant_id')->references('id')->on('tenants');
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
