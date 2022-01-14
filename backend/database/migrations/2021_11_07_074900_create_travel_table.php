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
        Schema::create('travel', function (Blueprint $collection) {
            $collection->id('_id')->unique();
//            $collection->charset = 'utf8mb4';
//            $collection->collation = 'utf8mb4_unicode_ci';

            $collection->string('city');
            $collection->string('user_id');
            $collection->string('bike_id');

            $collection->decimal('start_longitude', 10, 7)->nullable();
            $collection->decimal('start_latitude', 11, 8)->nullable();

            $collection->decimal('stop_longitude', 10, 7)->nullable();
            $collection->decimal('stop_latitude', 11, 8)->nullable();

            $collection->string('status')->default('parked');
            $collection->string('payment_status')->default('unpaid');
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
