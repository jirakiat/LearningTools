<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGrouplearns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grouplearns', function (Blueprint $table) {
            $table->id('group_learn_id');
            $table->string('group_learn_name');
            $table->string('group_learn_description');
            $table->string('group_learn_code');
            $table->text('image');
            $table->integer('user_id');
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
        Schema::dropIfExists('grouplearns');
    }
}
