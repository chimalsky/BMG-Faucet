<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('alternate_name')->nullable();
            $table->string('email')->nullable();

            $table->text('description')->nullable();
            $table->text('details')->nullable();
            $table->string('status')->nullable();
            $table->string('url')->nullable();

            $table->text('application_process')->nullable();
            $table->string('wait_time')->nullable();
            $table->string('accreditations')->nullable();
            $table->string('licenses')->nullable();
            
            $table->bigInteger('address_id')
                ->references('id')
                ->on('addresses')
                ->nullable();

            $table->string('metadata')->nullable();
            $table->string('flag')->nullable();

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
        Schema::dropIfExists('services');
    }
}
