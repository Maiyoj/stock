<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEngineerReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('engineer_reports', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('request_engineer_id');
            $table->integer('item_id');
            $table->string('site_name');
            $table->string('client_name');
            $table->integer('allocated_quantity');
            $table->string('document');
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
        Schema::dropIfExists('engineer_reports');
    }
}
