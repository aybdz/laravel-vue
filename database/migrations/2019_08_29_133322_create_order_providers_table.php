<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderProvidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_providers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('hash');
            $table->string('idProvider');
            $table->string('idCredit');
            $table->string('idUser');
            $table->bigInteger('total');
            $table->integer('qty');
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
        Schema::dropIfExists('order_providers');
    }
}
