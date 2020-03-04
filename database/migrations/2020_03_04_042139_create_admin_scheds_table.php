<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminSchedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_scheds', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('admin_id');
            $table->date('year');
            $table->date('month');
            $table->date('date');
            $table->time('s_time');
            $table->time('e_time');
            $table->boolean('all_flg');
            $table->timestamps();
            $table->boolean('delflg');

            //外部キー制約
            $table->foreign('admin_id')
               ->references('id')
               ->on('admins')
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
        Schema::dropIfExists('admin_scheds');
    }
}
