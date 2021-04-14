<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderLinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('order_lines');

        Schema::create('order_lines', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedBigInteger('order_id');            
            $table->foreign('order_id')
            ->references('id')
            ->on('orders')
            ->onDelete('cascade');

            $table->unsignedInteger('course_id');
            $table->foreign('course_id')
            ->references('id')
            ->on('courses')
            ->onDelete('cascade');


            $table->float('price');
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
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists('order_lines');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
