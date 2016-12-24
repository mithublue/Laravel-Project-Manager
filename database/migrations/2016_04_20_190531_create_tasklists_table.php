<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasklistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasklists', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->text('description');

            $table->integer('user_id')->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('users');

            $table->integer('project_id')->unsigned()->index();;
            $table->foreign('project_id')->references('id')->on('projects');

            $table->integer('module_id')->unsigned()->index();
            $table->foreign('module_id')->references('id')->on('modules');

            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->integer('est_time');

            $table->integer('parent');

            $table->string('status');
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
        Schema::drop('tasklists');
    }
}
