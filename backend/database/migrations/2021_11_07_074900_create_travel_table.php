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
        Schema::create('travel', function (Blueprint $collection) {
            $collection->foreignId('city');
            $collection->foreignId('user_id');
            $collection->foreignId('bike_id');

            $collection->decimal('start_longitude', 10, 7)->nullable();
            $collection->decimal('start_latitude', 11, 8)->nullable();
            $collection->decimal('stop_longitude', 10, 7)->nullable();
            $collection->decimal('stop_latitude', 11, 8)->nullable();

            $collection->string('status')->default('active');
            $collection->integer('price')->default(10);
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
        Schema::dropIfExists('travel');
    }
}
