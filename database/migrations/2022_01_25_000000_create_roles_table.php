<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolesTable extends Migration
{
  public function up()
  {
    Schema::create("roles", function (Blueprint $table) {
      // Columns
      $table->integer("id")->unique()->primary();
      $table->string("label", 24)->unique();
      $table->string("acronym", 24);
      $table->boolean("visible")->default(false);
      $table->timestamps();
    });
  }

  public function down()
  {
    Schema::dropIfExists("roles");
  }
}