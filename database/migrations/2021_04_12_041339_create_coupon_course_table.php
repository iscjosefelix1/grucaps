<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCouponCourseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {        
        Schema::dropIfExists('coupon_course');
        Schema::create('coupon_course', function (Blueprint $table) {

            $table->unsignedInteger('course_id');
            $table->foreign('course_id')->references('id')->on('courses');

            $table->unsignedInteger('coupon_id');
            $table->foreign('coupon_id')->references('id')->on('coupons');

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
        Schema::dropIfExists('coupon_course');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
