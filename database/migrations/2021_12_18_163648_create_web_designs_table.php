<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWebDesignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('web_designs', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('main_color');
            $table->string('font_family');
            $table->string('like_button');
            $table->string('header_text');
            $table->string('header_img');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('web_designs');
    }
}
