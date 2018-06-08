<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('slug');
            $table->text('details');
            $table->decimal('price', 9, 2);
            $table->integer('sale_type_id')->unsigned();
            $table->integer('property_type_id')->unsigned();
            $table->string('city_id');
            $table->string('address_1');
            $table->string('address_2');
            $table->string('address_3');
            $table->integer('number_of_beds');
            $table->integer('number_of_baths');
            $table->boolean('pet_allowed');
            $table->boolean('dishwasher');
            $table->boolean('furnished');
            $table->string('photo');
            $table->boolean('sold');
            $table->boolean('active');
            $table->timestamps();

            $table->foreign('sale_type_id')
                ->references('id')->on('sale_types');

            $table->foreign('property_type_id')
                ->references('id')->on('property_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('properties');
    }
}
