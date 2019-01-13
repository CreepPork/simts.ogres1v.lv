<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('works', function (Blueprint $table) {
            $table->increments('id');

            $table->text('title');
            $table->longText('body');

            $table->dateTime('completed_at')->nullable();

            $table->unsignedInteger('teacher_id')->index();
            $table->foreign('teacher_id')->references('id')->on('teachers');

            $table->unsignedInteger('work_status_id')->index();
            $table->foreign('work_status_id')->references('id')->on('work_statuses');

            $table->integer('priority')->nullable();

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
        Schema::dropIfExists('works');
    }
}
