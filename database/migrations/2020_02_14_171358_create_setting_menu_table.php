<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingMenuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('setting_menu', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('dich_vu')->nullable()->default(0);
            $table->integer('du_an')->nullable()->default(0);
            $table->integer('khach_hang')->nullable()->default(0);
            $table->integer('tin_tuc')->nullable()->default(0);
            $table->integer('tuyen_dung')->nullable()->default(0);
            $table->integer('lien_he')->nullable()->default(0);
            $table->integer('bao_gia')->nullable()->default(0);
            $table->integer('gioi_thieu')->nullable()->default(0);
            $table->integer('lanh_dao')->nullable()->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('setting_menu');
    }
}
