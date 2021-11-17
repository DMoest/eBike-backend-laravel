<?php

/**
 * Declaration of the models namespace and use of other namespaces.
 */
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


/**
 * Database Migration class.
 */
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
//            $collection->id('_id')->autoIncrement()->unique();
            $collection->charset = 'utf8mb4';
            $collection->collation = 'utf8mb4_unicode_ci';

            $collection->foreignId('city')->references('name')->on('cities');
            $collection->foreignId('user_id')->references('_id')->on('users');
            $collection->foreignId('bike_id')->references('_id')->on('bikes');

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
