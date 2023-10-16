<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Category extends Model
{
    use HasFactory;

    public function parent(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'parent_id'); //get parent category
    }
    public function children(): HasMany
    {
        return $this->hasMany(Category::class, 'parent_id'); //get all subs. NOT RECURSIVE
    }
    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
