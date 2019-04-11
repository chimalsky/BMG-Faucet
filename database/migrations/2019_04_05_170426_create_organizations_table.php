<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrganizationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organizations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('alternate_name')->nullable();
            $table->string('x_uid')->nullable();
            $table->longText('description')->nullable();
            $table->string('email')->nullable();
            $table->string('url')->nullable();
            $table->string('legal_status')->nullable();
            $table->string('tax_status')->nullable();
            $table->string('tax_id')->nullable();
            $table->string('year_incorporated')->nullable();

            $table->text('organization_services')->nullable();
            $table->text('organization_phones')->nullable();
            $table->text('organization_locations')->nullable();
            $table->bigInteger('organization_contact')->nullable();
            $table->string('organization_details')->nullable();
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
        Schema::dropIfExists('organizations');
    }
}
