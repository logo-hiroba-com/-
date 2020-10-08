<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDesignersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('designers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedinteger('user_id')->comment('ユーザーID');

            //デザイナー紹介
            $table->string('designer_path',128)->nullable()->comment('写真のパス');
            $table->text('designer_intro')->nullable()->comment('自己PR');
            $table->tinyInteger('designer_image1')->comment('得意イメージ1');
            $table->tinyInteger('designer_image2')->nullable()->comment('得意イメージ2');
            $table->tinyInteger('designer_rank')->nullable()->comment('会員ランク');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('designers');
    }
}

?>