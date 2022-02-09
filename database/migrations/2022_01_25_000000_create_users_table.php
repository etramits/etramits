<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
  public function up()
  {
    Schema::create("users", function (Blueprint $table) {
      // Columns
      $table->id();
      $table->string("username", 24)->unique();
      $table->string("email")->unique();
      $table->string("password");
      $table->rememberToken();
      $table->integer("role_id")->index()->default(1); // 1) user | 2) editor | 3) moderator | 4) admin
      $table->boolean("active")->default(true);
      $table->timestamps();
    });
  }

  public function down()
  {
    Schema::dropIfExists("users");
  }
}