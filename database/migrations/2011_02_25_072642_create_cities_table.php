<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        // DROP TABLE IF EXISTS `cities`;
        // CREATE TABLE IF NOT EXISTS `cities` (
        // `id` mediumint(8) unsigned NOT NULL,
        // `name` varchar(255) NOT NULL,
        // `state_id` mediumint(8) unsigned NOT NULL,
        // `state_code` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
        // `country_id` mediumint(8) unsigned NOT NULL,
        // `country_code` char(2) NOT NULL,
        // `latitude` decimal(10,8) NOT NULL,
        // `longitude` decimal(11,8) NOT NULL,
        // `created_at` timestamp NOT NULL DEFAULT '2013-12-31 19:31:01',
        // `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        // `flag` tinyint(1) NOT NULL DEFAULT '1',
        // `wikiDataId` varchar(255) DEFAULT NULL COMMENT 'Rapid API GeoDB Cities'
        // ) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;
        Schema::create('cities', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();


            $table->string('ar_name', 100);
            $table->string('name', 100);
            $table->integer('state_id');
            $table->string('state_code', 100);
            $table->integer('country_id');
            $table->string('country_code', 2);
            $table->decimal('latitude', 11, 7);
            $table->decimal('longitude', 11, 7);
            $table->integer('flag');
            $table->string('wikiDataId', 30);

            // to be removed
            $table->string('updated_on', 100);
            $table->string('code', 2);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cities');
    }
}
