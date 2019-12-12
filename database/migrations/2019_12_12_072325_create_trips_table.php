<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTripsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trips', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();

            $table->string('public_name', 100);
            $table->text('desc');
            $table->json('trip_path');
            $table->string('code', 50);

            $table->string('travel_by', 50);

            $table->date('travel_date');
            $table->integer('num_of_days');
            $table->integer('num_of_nights');
            $table->date('return_date');

            $table->string('travel_time', 50);
            $table->string('food_options', 50);

            $table->integer('trippers_limit');
            $table->integer('trippers_booked');

            $table->string('own_bed_age_range', 50);
            $table->string('own_chair_age_range', 50);

            $table->float('adult_price', 8, 3);
            $table->float('teen_price', 8, 3);
            $table->float('boy_price', 8, 3);
            $table->float('baby_price', 8, 3);
            $table->float('infant_price', 8, 3);

            $table->integer('baby_start_age');
            $table->integer('boy_start_age');
            $table->integer('teen_start_age');
            $table->integer('adult_start_age');

            $table->json('ex_custom_things');
            $table->date('created_date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trips');
    }
}
