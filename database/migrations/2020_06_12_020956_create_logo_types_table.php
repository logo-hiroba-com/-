<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogoTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logo_types', function (Blueprint $table) {
            $table->increments('type_id');
            $table->unsignedinteger('type_parent_id')->comment('親ジャンルID');
            $table->string('type_parent_name',64)->comment('親ジャンル名');
            $table->unsignedinteger('type_child_id')->nullable()->comment('子ジャンルID');
            $table->string('type_child_name',64)->nullable()->comment('子ジャンル名');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('logo_types');
    }
}
