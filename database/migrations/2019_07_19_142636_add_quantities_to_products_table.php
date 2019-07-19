<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddQuantitiesToProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->integer('xs')->nullable();
            $table->integer('s')->nullable();
            $table->integer('m')->nullable();
            $table->integer('l')->nullable();
            $table->integer('xl')->nullable();
            $table->integer('tu')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('xs');
            $table->dropColumn('s');
            $table->dropColumn('m');
            $table->dropColumn('l');
            $table->dropColumn('xl');
            $table->dropColumn('tu');
        });
    }
}
