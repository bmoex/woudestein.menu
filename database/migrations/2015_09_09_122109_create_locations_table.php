<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLocationsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locations', function (Blueprint $table) {
            $table->increments('id');

            // Default information
            $table->string('title');
            $table->longText('description')->nullable();
            $table->string('email')->nullable();
            $table->text('website');
            $table->text('phone')->nullable();
            $table->text('icon');
            $table->text('logo')->nullable();

            // Address
            $table->string('address')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('city')->nullable();
            $table->string('country')->nullable();
            $table->float('latitude');
            $table->float('longitude');

            // Editors and timestamps
            $table->integer('created_by')->index()->unsigned();
            $table->integer('updated_by')->index()->unsigned();
            $table->integer('deleted_by')->index()->unsigned();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('locations');
    }
}
