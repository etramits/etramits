<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
      'user_id',
      'content',
      'active',
      'article_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
