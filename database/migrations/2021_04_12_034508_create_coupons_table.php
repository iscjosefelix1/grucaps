<?php

use App\Models\Coupon;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('coupons');
        Schema::create('coupons', function (Blueprint $table) {
            $table->increments('id');     
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('code');
            $table->string('description');
            $table->enum('discount_type', [App\Models\Coupon::PERCENT, App\Models\Coupon::PRICE])->default(App\Models\Coupon::PRICE);
            $table->tinyInteger('discount');
            $table->boolean('enabled');
            $table->date("expires_at")->nullable();
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
        Schema::dropIfExists('coupons');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');

        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists('users');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
