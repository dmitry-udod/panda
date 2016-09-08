<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shops', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('foreign_id');
            $table->string('city');
            $table->string('object_type');
            $table->text('shop_name_full');
            $table->string('open_at');
            $table->string('close_at');
            $table->string('always_open');
            $table->text('address');
            $table->text('contacts');
            $table->string('lat');
            $table->string('lnt');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('shops');
    }
}