<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNextTimeScheduleRun extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('next_time_schedule_run', function (Blueprint $table) {
            $table->id();
            $table->string('command_name');
            $table->string('last_status')->default('created');
            $table->timestamp('last_execute')->nullable();
            $table->timestamp('next_execute');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('next_time_schedule_run');
    }
}
