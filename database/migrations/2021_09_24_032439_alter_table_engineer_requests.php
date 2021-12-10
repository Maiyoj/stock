<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableEngineerRequests extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('request_engineers', function (Blueprint $table) {
            $table->dropColumn('quantity');
            $table->dropColumn('item_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('request_engineers', function (Blueprint $table) {
            $table->integer('quantity');
            $table->integer('item_id');
        });
    }
}
