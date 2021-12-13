<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParkingZonesTable extends Migration
{
    /**
     * @description Migration database connection.
     */
    protected $connection = 'mysql';


    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parking_zones', function (Blueprint $collection) {
            $collection->id('_id')->unique();
            $collection->string('city');

            $collection->decimal('sw_longitude', 10, 7);
            $collection->decimal('sw_latitude', 11, 8);
            $collection->decimal('ne_longitude', 10, 7);
            $collection->decimal('ne_latitude', 11, 8);

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
        Schema::dropIfExists('parking_zones');
    }
}
