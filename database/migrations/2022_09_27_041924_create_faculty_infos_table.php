<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacultyInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('faculty_infos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->string('full_name');
            $table->string('faculty_id');
            $table->unsignedBigInteger('major_course');
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
        Schema::dropIfExists('faculty_infos');
    }
}
