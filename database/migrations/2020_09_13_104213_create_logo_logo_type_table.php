<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogoLogoTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logo_logo_type', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('logo_id')->comment('ロゴID');
            $table->unsignedInteger('logo_type_id')->nullable()->comment('ジャンルID');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('logo_logo_type');
    }
}
