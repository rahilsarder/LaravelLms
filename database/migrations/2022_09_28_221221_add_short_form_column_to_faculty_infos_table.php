<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddShortFormColumnToFacultyInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('faculty_infos', function (Blueprint $table) {
            $table->string('short_form');
            $table->string('department');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('faculty_infos', function (Blueprint $table) {
            $table->dropColumn('short_form');
        });
    }
}
