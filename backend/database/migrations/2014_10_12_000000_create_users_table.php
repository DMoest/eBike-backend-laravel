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
//            $collection->id()->autoIncrement()->unique();
            $collection->string('firstname');
            $collection->string('lastname');
            $collection->string('adress');
            $collection->string('postcode');
            $collection->foreignId('city');
            $collection->unique('phone');
            $collection->unique('email');
            $collection->timestamp('email_verified_at')->nullable();
            $collection->string('password');
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
