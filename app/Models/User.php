<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
  use HasApiTokens, HasFactory, Notifiable;

  protected $fillable = [
    "username",
    "email",
    "password",
    "role_id",
    "verified",
    "active",
  ];

  protected $hidden = [
    "password",
    "remember_token",
  ];

  public function role()
  {
    return $this->belongsTo(Role::class);
  }
}