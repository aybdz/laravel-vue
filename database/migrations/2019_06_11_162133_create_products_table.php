<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('bareCode');
            $table->string('name');
            $table->string('img')->default("noImg.png");
            $table->bigInteger('priceA')->default(0);
            $table->bigInteger('priceV')->default(0);
            $table->integer('qty')->default(0);
            $table->string('idUser');
            $table->text('descp')->nullable();
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
        Schema::dropIfExists('products');
    }
}
