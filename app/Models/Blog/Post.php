<?php

namespace App\Models\Blog;

use App\Models\Blog\Dashboard\Category\Category_pays;
use App\Models\Blog\Dashboard\Slug;
use App\Models\Blog\Dashboard\Upload_image;
use App\Models\Blog\Front\Comment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;



class Post extends Model
{

    public function slug(): BelongsTo
    {
        return $this->belongsTo(Slug::class);
    }


    public function category_pays(): HasMany
    {
        return $this->hasMany(Category_pays::class);
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function uploadImages(): HasMany
    {
        return $this->hasMany(Upload_image::class);
    }
}
