<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('create_messages_table', function (Blueprint $table) {
            $table->id();
            $table->integer('conversation_id')->unsigned();
            $table->morphs('person');
            $table->text('body');
            $table->softDeletes();
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
        Schema::dropIfExists('messages');
    }
};
