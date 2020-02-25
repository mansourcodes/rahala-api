<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAirlinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*
        CREATE TABLE IF NOT EXISTS `airlines` (
`code` VARCHAR(MAX) NULL,
`lcc` VARCHAR(MAX) NULL,
`en_name` VARCHAR(MAX) NULL,
`logourl` VARCHAR(MAX) NULL,
`logo` VARCHAR(MAX) NULL,
`ar_name` VARCHAR(MAX) NULL
);


*/
        Schema::create('airlines', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();


            $table->string('code', 50);
            $table->string('lcc', 50);
            $table->string('en_name', 100);
            $table->string('ar_name', 100)->nullable();
            $table->string('logourl', 100);
            $table->string('logo', 100)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('airlines');
    }
}
