<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogoFontsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logo_fonts', function (Blueprint $table) {
            $table->increments('font_id')->comment('フォントID');
            $table->unsignedinteger('font_japaness')->comment('日本語フォント');
            $table->unsignedinteger('font_english')->comment('英語フォント');
            $table->string('font_name',64)->comment('フォントイメージ');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('logo_fonts');
    }
}
