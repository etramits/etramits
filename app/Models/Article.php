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

    // private function generateSlug($title)
    // {
    //     if (static::whereSlug($slug = Str::slug($title))->exists()) {
    //         $max = static::whereName($title)->latest('id')->skip(1)->value('slug');
    //         if (isset($max[-1]) && is_numeric($max[-1])) {
    //             return preg_replace_callback('/(\d+)$/', function($mathces) {
    //                 return $mathces[1] + 1;
    //             }, $max);
    //         }
    //         return "{$slug}-2";
    //     }

    //     return $slug;

    // } 
}
