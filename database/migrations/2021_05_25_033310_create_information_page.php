<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInformationPage extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('information_page', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description')->nullable();
            $table->string('email');
            $table->string('phone')->nullable();
            $table->string('phone_2"')->nullable();
            $table->string('email_2')->nullable();
            $table->string('first_photo');
            $table->string('second_photo')->nullable();
            $table->unsignedBigInteger('theme_id')->nullable();
            $table->timestamps();
            // Relationship
            $table->foreign('theme_id')
                ->references('id')
                ->on('theme')
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
        Schema::dropIfExists('information_page');
    }
}
