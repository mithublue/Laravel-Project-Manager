<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateColumnsOnTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tasks', function (Blueprint $table) {
            $table->string('title');
            $table->text('description');

            $table->integer('user_id')->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('users');

            $table->integer('project_id')->unsigned()->index();
            $table->foreign('project_id')->references('id')->on('projects');

            $table->integer('module_id')->unsigned()->index();
            $table->foreign('module_id')->references('id')->on('modules');

            $table->integer('tasklist_id')->unsigned()->index();
            $table->foreign('tasklist_id')->references('id')->on('tasklists');

            $table->integer('parent');
            $table->dateTime('start_date');
            $table->integer('est_time');
            $table->dateTime('end_date');
            $table->string('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tasks', function (Blueprint $table) {
            $table->dropColumn('title');
            $table->dropColumn('description');
            $table->dropColumn('user_id');
            $table->dropColumn('project_id');
            $table->dropColumn('module_id');
            $table->dropColumn('tasklist_id');
            $table->dropColumn('start_date');
            $table->dropColumn('est_time');
            $table->dropColumn('end_date');
            $table->dropColumn('status');
            $table->dropColumn('parent');
        });
    }
}
