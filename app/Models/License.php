<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class License extends Model
{
  use HasFactory;
  use SoftDeletes;

  protected $fillable = [
    'label',
    'slug',
    'visible',
  ];

  public function resolveRouteBinding($value, $field = null)
  {
    return $this->where($field ?? 'id', $value)->withTrashed()->firstOrFail();
  }
}