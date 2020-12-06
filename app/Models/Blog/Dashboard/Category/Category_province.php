<?php

namespace App\Models\Blog\Dashboard\Category;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Category_province extends Model
{
    public function category_region(): BelongsTo
    {
        return $this->belongsTo(Category_region::class, 'region_id');
    }
}
