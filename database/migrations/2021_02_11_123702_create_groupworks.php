<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGroupworks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('groupworks', function (Blueprint $table) {
            $table->id('group_works_id');
            $table->string('group_works_name');
            $table->string('group_works_file');
            $table->string('group_works_type');
            $table->dateTime('group_works_start');
            $table->dateTime('group_works_end');
            $table->string('group_works_description');
            $table->integer('group_learn_id');
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
        Schema::dropIfExists('groupworks');
    }
}
