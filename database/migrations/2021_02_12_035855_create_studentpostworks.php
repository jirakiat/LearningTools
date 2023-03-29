<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentpostworks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('studentpostworks', function (Blueprint $table) {
            $table->id('studentpostworks_id');
            $table->integer('students_id');
            $table->string('studentpostworks_file');
            $table->dateTime('verifytime');
            $table->integer('group_works_id');
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
        Schema::dropIfExists('studentpostworks');
    }
}
