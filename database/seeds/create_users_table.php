<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            
            //メール認証関係
            $table->datetime('email_verified_at')->nullable()->comment('認証日時');
            $table->tinyInteger('status')->default(0)->comment('認証済みかどうか');
            $table->string('email_verify_token')->nullable()->comment('認証トークン');

            //アカウント情報
            $table->string('mail',128)->unique()->comment('メールアドレス');
            $table->string('password')->comment('パスワード');
            $table->string('username',64)->comment('ユーザーネーム');

            //アカウント属性
            $table->tinyInteger('designer')->default(0)->comment('デザイナーとして');
            $table->tinyInteger('customer')->default(0)->comment('購入者として');

            $table->rememberToken();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
