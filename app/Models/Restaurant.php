<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Restaurant extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
        'logo',
        'cover_image',
        'phone',
        'address',
        'primary_color',
        'secondary_color',
        'background_color',
        'is_active',
    ];

    public function categories(): HasMany
    {
        return $this->hasMany(Category::class);
    }
      public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
