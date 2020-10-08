<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogoLogoImproveTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logo_logo_improve', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('logo_id')->comment('カードID');
            $table->unsignedInteger('improve_id')->nullable()->comment('商品ID');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('logo_logo_improve');
    }
}
