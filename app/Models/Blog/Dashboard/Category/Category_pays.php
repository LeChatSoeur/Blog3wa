<?php

namespace App\Models\Blog\Dashboard\Category;

use App\Models\Blog\Post;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category_pays extends Model
{
    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class, 'post_id');
    }

    public function category_region(): hasMany
    {
        return $this->hasMany(Category_region::class);
    }


}
