<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('details', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            $table->text('value')->nullable();
            $table->text('type')->nullable();
            $table->text('description')->nullable();
            $table->text('organizations')->nullable();
            $table->text('services')->nullable();
            $table->text('locations')->nullable();
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
        Schema::dropIfExists('details');
    }
}
