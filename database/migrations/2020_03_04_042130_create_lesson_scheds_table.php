<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLessonSchedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lesson_scheds', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->date('year')->comment('年');
            $table->date('month')->comment('月');
            $table->date('date')->comment('日');
            $table->time('s_time')->comment('開始時間');
            $table->time('e_time')->comment('終了時間');
            $table->timestamps();
            $table->boolean('delflg')->comment('削除フラグ');

            //外部キー制約
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
        Schema::dropIfExists('lesson_scheds');
    }
}
