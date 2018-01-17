<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('reservations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('roomId');
            $table->integer('customerId');
            $table->float('paid')->default(0);
            $table->string('status');
            $table->dateTime('startDate');
            $table->dateTime('endDate');
            $table->integer('needCarPark');
            $table->string('payWay');
            $table->float('sum');
            $table->string('bookWay');
            $table->string('commend')->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();



        });
    }



    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('reservations');
    }
}
