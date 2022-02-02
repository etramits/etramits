<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
  use HasFactory;

  protected $fillable = [
    "content",
    "active",
  ];

  public function user()
  {
      return $this->belongsTo(User::class);
  }

  public function article()
  {
      return $this->belongsTo(Article::class);
  }

}