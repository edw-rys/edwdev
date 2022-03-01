<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorksHistoryContent extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('works_history_content', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('image',200)->nullable();
            $table->longText('description')->nullable();
            $table->unsignedBigInteger('work_history_id');

            $table->timestamps();
            $table->string('status')->default('active');
            $table->dateTime('deleted_at')->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->unsignedBigInteger('deleted_by')->nullable();
            // Relationship
            $table->foreign('created_by')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->foreign('updated_by')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->foreign('deleted_by')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
                
            $table->foreign('work_history_id')
                ->references('id')
                ->on('works_history')
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
        Schema::dropIfExists('works_history_content');
    }
}
