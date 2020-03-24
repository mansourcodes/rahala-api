<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();


            $table->string('client_name', 100);
            $table->mediumText('logo_img');
            $table->longText('contact');

            $table->string('client_alian', 100)->unique();
            $table->string('db_name', 50);
            $table->string('db_user', 50);
            $table->string('db_pass', 50);
            $table->string('db_host', 50);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clients');
    }
}
