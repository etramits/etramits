<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
  public function up()
  {
    Schema::create("categories", function (Blueprint $table) {
      // Columns
      $table->id();
      $table->string("name", 32)->unique();
      $table->string("slug")->unique();
      $table->string("icon")->nullable();
      $table->string("description", 128)->nullable();
      $table->integer("parent")->nullable();
      $table->integer("user_id")->index();
      $table->boolean("active")->default(false);
      $table->timestamps();
    });
  }

  public function down()
  {
    Schema::dropIfExists("categories");
  }
}