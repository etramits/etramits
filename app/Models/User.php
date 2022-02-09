<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Hash;


class User extends Authenticatable
{
  use HasApiTokens, HasFactory, Notifiable;

  protected $fillable = [
    "username",
    "email",
    "password",
    "role_id",
    "active",
  ];

  protected $hidden = [
    "password",
    "remember_token",
  ];

  protected $casts = [
    'email_verified_at' => 'datetime',
  ];

  public function setPasswordAttribute($password)
  {
      $this->attributes['password'] = Hash::make($password);
  }

  public function role()
  {
    return $this->belongsTo(Role::class);
  }

  public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}