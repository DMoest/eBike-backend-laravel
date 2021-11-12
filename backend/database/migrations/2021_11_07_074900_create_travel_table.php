<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTravelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('travel', function (Blueprint $table) {
//            $table->id()->autoIncrement()->unique();
            $table->foreignId('city_id');
            $table->foreignId('user_id');
            $table->foreignId('bike_id');

            $table->decimal('start_longitude', 10, 7)->nullable();
            $table->decimal('start_latitude', 11, 8)->nullable();
            $table->decimal('stop_longitude', 10, 7)->nullable();
            $table->decimal('stop_latitude', 11, 8)->nullable();

            $table->string('status')->default('active');
            $table->integer('price')->default(10);
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
        Schema::dropIfExists('travel');
    }
}
