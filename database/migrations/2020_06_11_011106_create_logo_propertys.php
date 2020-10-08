<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogoPropertys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logo_propertys', function (Blueprint $table) {
            $table->increments('id')->comment('ID');
            $table->unsignedinteger('logo_id')->comment('ロゴID');
            $table->string('logo_title',128)->comment('ロゴタイトル');
            $table->unsignedinteger('logo_color')->comment('ロゴのカラー');
            $table->unsignedinteger('logo_format')->comment('ロゴの形');
            $table->unsignedinteger('logo_image')->comment('ロゴのイメージ');
            $table->unsignedinteger('type_num')->comment('ロゴのジャンル');
            $table->unsignedinteger('logo_font')->comment('ロゴのフォント');
            $table->text('logo_concept')->nullable()->comment('ロゴのコンセプト');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('logo_propertys');
    }
}

?>
