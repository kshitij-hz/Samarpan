<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkExperiencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_experiences', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedinteger('user_id')->nullable();
            $table->string('sector');
            $table->string('category')->nullable();
            $table->string('ministry')->nullable();
            $table->string('department')->nullable();
            $table->string('company');
            $table->string('location');
            $table->string('rank');
            $table->string('position')->nullable();
            $table->string('role');
            $table->string('description')->nullable();
            $table->date('from')->nullable();
            $table->date('to')->nullable();
            $table->timestamps();

            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('work_experiences');
    }
}
