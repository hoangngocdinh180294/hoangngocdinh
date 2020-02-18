<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumWhyInSettingMenuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('setting_menu', function (Blueprint $table) {
            $table->integer('slide')->nullable()->default(0);
            $table->integer('header')->nullable()->default(0);
            $table->integer('tai_sao')->nullable()->default(0);
            $table->integer('slogan')->nullable()->default(0);
            $table->integer('instagram')->nullable()->default(0);
            $table->integer('footer')->nullable()->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('setting_menu', function (Blueprint $table) {
            $table->dropColumn('slide');
            $table->dropColumn('header');
            $table->dropColumn('tai_sao');
            $table->dropColumn('slogan');
            $table->dropColumn('instagram');
            $table->dropColumn('footer');
        });
    }
}
