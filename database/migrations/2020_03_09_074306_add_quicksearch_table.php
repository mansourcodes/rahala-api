<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddQuicksearchTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quicksearchs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();

            $table->string('search_label', 225);
            $table->string('cities', 225);
            $table->string('travel_by', 50);


            $table->date('date_from');
            $table->date('date_to');

            $table->mediumText('background_img');
            $table->string('background_color', 10);

            $table->integer('order');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quicksearchs');
    }
}
