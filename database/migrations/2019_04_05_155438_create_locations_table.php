<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigIncrements('id');

            $table->string('name')->nullable();
            $table->string('organization')->nullable();
            $table->string('alternate_name')->nullable();
            $table->string('transportation')->nullable();

            $table->double('latitude')->nullable();
            $table->double('longitude')->nullable();
            $table->string('description')->nullable();
            $table->string('details')->nullable();

            $table->bigInteger('address_id')
                ->references('id')
                ->on('addresses')
                ->nullable();

            $table->string('flag', 45)->nullable();

            $table->string('airtable_id');

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
        Schema::dropIfExists('locations');
    }
}
