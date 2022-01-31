<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
  use HasFactory;

  protected $fillable = [
    "label",
    "acronym",
    "visible",
  ];

  public function users()
  {
    return $this->hasMany(User::class);
  }
}