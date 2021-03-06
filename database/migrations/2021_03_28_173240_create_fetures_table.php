<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fetures', function (Blueprint $table) {
            $table->id();
            $table->integer('topic_id');
            $table->integer('group_id');
            $table->string('title');
            $table->longText('content');
            $table->string('status');
            $table->string('date_create');
            $table->longText('image')->nullable();
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
        Schema::dropIfExists('fetures');
    }
}
