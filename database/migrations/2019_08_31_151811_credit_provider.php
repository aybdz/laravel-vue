<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreditProvider extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('credit_providers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('idOrder');
            $table->string('idProvider');
            $table->bigInteger('total');
            $table->bigInteger('paid')->default(0);
            $table->bigInteger('staid')->default(0);
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
         Schema::dropIfExists('credit_providers');
    }
}
