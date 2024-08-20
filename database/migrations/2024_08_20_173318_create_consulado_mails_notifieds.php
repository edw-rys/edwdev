<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsuladoMailsNotifieds extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consulado_mails_notifieds', function (Blueprint $table) {
            $table->id();
            $table->string('user');
            $table->text('emails')->nullable();
            $table->string('max_date')->nullable();
            $table->longText('response')->nullable();
            $table->string('status')->default('active');
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
        Schema::dropIfExists('consulado_mails_notifieds');
    }
}
