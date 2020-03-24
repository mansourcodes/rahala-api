<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Config;
use Symfony\Component\Process\PhpExecutableFinder;


class AddCitiesData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        var_dump(PHP_OS);

        if(PHP_OS == "Windows" || PHP_OS == "WINNT" ){
            exec("C:\\xampp\mysql\bin\mysql -u " . env('DB_USERNAME') . " -p" . env('DB_PASSWORD') . " " . env('DB_DATABASE') . " < " . base_path('database'.DIRECTORY_SEPARATOR.'factories'.DIRECTORY_SEPARATOR.'cities.sql'));

        }else if(PHP_OS == "Darwin"){
            exec("/Applications/XAMPP/xamppfiles/bin/mysql  -u " . env('DB_USERNAME') . " -p" . env('DB_PASSWORD') . " " . env('DB_DATABASE') . " < " . base_path('database'.DIRECTORY_SEPARATOR.'factories'.DIRECTORY_SEPARATOR.'cities.sql'));

        }else{
            exec("mysql -u " . env('DB_USERNAME') . " -p" . env('DB_PASSWORD') . " " . env('DB_DATABASE') . " < " . base_path('database'.DIRECTORY_SEPARATOR.'factories'.DIRECTORY_SEPARATOR.'cities.sql'));

        }



        DB::update('update cities set ar_name = name');
        Schema::table('cities', function ($table) {
            $table->dropColumn('updated_on');
            $table->dropColumn('code');
            $table->index(['name', 'ar_name', 'country_code']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('cities')->truncate();

        Schema::table('cities', function (Blueprint $table) {
            $table->string('updated_on', 100);
            $table->dropIndex(['name', 'ar_name', 'country_code']);
        });
    }
}
