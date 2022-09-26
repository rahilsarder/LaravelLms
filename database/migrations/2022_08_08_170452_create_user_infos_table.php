<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_infos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('full_name');
            $table->string('student_id');
            $table->string('enrolled_in');
            $table->string('curriculum_name');
            $table->integer('test_pass');
            $table->string('current_status');
            $table->float('current_cgpa');
            $table->float('credit_passed');
            $table->integer('probation');
            $table->string('major1')->nullable();
            $table->string('major2')->nullable();
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
        Schema::dropIfExists('user_infos');
    }
}
