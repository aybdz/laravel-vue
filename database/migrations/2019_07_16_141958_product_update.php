<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProductUpdate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_updates', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('idUser');
            $table->string('type');
            $table->string('idProduct');
            $table->text('oldProduct');
            $table->text('newProduct');
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
       Schema::drop('product_updates'); //
    }
}
