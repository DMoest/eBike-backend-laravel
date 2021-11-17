<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $collection) {
//            $collection->id('_id')->autoIncrement()->unique();
            $collection->string('provider_id')->nullable();
            $collection->string('firstname');
            $collection->string('lastname');
            $collection->string('adress')->nullable()->change();
            $collection->string('postcode')->nullable()->change();
            $collection->foreignId('city')->nullable()->change();
            $collection->string('phone')->nullable()->change();
            $collection->unique('email');
            $collection->timestamp('email_verified_at')->nullable();
            $collection->string('password')->nullable(); // Null for creating new users depending on OAuth providers.
            $collection->string('payment_method');
            $collection->string('payment_status');
            $collection->rememberToken();
            $collection->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
