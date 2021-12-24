<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'description',
        'parent',
        'active',
        'slug',
        'creator_id',
        'icon',
    ];

    public function articles()
    {
        return $this->hasMany(Article::class);
    }

}
