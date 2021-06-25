<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTheme extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('theme', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('style');
            $table->string('other_style');
            $table->string('script');
            $table->string('other_script');
            $table->string('field');
            $table->string('other_field');
            $table->string('status', 25);

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
        Schema::dropIfExists('theme');
    }
}
