<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('roles');
        Schema::dropIfExists('users');
        Schema::dropIfExists('state');
        Schema::dropIfExists('user_social_accounts');

        Schema::create('roles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->comment('Nombre del rol de usuario');
            $table->text('description');
            $table->timestamps();
        });

        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('role_id')->default(\App\Role::STUDENT);
            $table->foreign('role_id')->references('id')->on('roles');
            $table->string('name');
            $table->string('last_name')->nullable();
            $table->string('slug');
            $table->string('email')->unique();
            $table->string('password')->nullable();
            $table->string('picture')->nullable();
            $table->string('stripe_id')->nullable()->index();
            $table->string('card_brand')->nullable();
            $table->string('card_last_four', 4)->nullable();
            $table->timestamp('trial_ends_at')->nullable();

            /*Son los campos que se acaban de agregar 13Sept*/
            $table->string('state')->nullable();
            $table->string('town')->nullable();
            $table->string('profession')->nullable();
            $table->string('age')->nullable();
            $table->string('sex')->nullable();
            $table->string('interests')->nullable();
            $table->integer('phone_number')->nullable();

            $table->rememberToken();
            $table->timestamps();
        });       

        
        Schema::create('user_social_accounts', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('provider');
            $table->string('provider_uid');
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
    Schema::dropIfExists('users');
    DB::statement('SET FOREIGN_KEY_CHECKS = 1');

	DB::statement('SET FOREIGN_KEY_CHECKS = 0');
    Schema::dropIfExists('roles');
    DB::statement('SET FOREIGN_KEY_CHECKS = 1');

	DB::statement('SET FOREIGN_KEY_CHECKS = 0');
    Schema::dropIfExists('user_social_accounts');
    DB::statement('SET FOREIGN_KEY_CHECKS = 1');

    }
}
