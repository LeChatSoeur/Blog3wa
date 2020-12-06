<?php

namespace App\Models\Blog\Dashboard\Category;

use App\Models\Blog\Post;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category_region extends Model
{
    public function category_pays(): BelongsTo
    {
        return $this->belongsTo(Category_pays::class, 'pays_id');
    }

    public function category_province(): hasMany
    {
        return $this->hasMany(Category_province::class);
    }



}
