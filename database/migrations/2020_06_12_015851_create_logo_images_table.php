<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogoImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logo_images', function (Blueprint $table) {
            $table->increments('id')->comment('ID');
            $table->unsignedinteger('logo_id')->comment('ロゴID');
            $table->string('cust_before_path',256)->comment('カスタマイズ前のパス');
            $table->string('cust_after_path',256)->nullable()->comment('カスタマイズ後のパス');
            $table->datetime('cust_date')->nullable()->comment('カスタマイズ日');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('logo_images');
    }
}
