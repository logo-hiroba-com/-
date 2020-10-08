<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logos', function (Blueprint $table) {
            $table->bigIncrements('logo_id')->comment('ロゴID');
            $table->datetime('create_at')->comment('作成日');
            $table->datetime('update_at')->comment('更新日');
            $table->unsignedinteger('user_id')->comment('デザイナーID');
            $table->unsignedinteger('logo_price')->comment('金額パターン');
            $table->unsignedinteger('sold_switch')->comment('売れているかどうか');
            $table->datetime('sold_date')->nullable()->comment('販売した日');
            $table->unsignedinteger('like_num')->default(0)->comment('いいね数');
            $table->unsignedinteger('view_switch')->default(1)->comment('表示するかどうか');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('logos');
    }
}

?>