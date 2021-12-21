<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class Article extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
      'title',
      'slug',
      'category_id',
      'content',
      'author_id',
      'active',
    ];

    protected static function boot()
    {
        parent::boot();

        static::created(function ($article) {
            // $article->slug = $article->generateSlug($article->title);
            $article->save();
        });

    }

    public function comment() {
        return $this->hasMany(Comment::class);
    }

    public function favorites()
    {
        return $this->belongsToMany(User::class, 'favorites');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
