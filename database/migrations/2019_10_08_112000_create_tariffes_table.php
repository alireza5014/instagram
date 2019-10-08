<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTariffesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tariffes', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('title');
            $table->integer('price');

            $table->timestamps();
        });


        Schema::create('tariffe_item', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');


            $table->bigInteger('tariffe_id')->unsigned();

            $table->foreign('tariffe_id')
                ->references('id')
                ->on('tariffes')
                ->onDelete('cascade')
                ->onUpdate('cascade');




        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tariffes');
        Schema::dropIfExists('tariffe_item');
    }
}
