<?php

namespace App\Models\Blog\Dashboard;

use App\Models\Blog\Post;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Upload_image extends Model
{
    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class);
    }

    public function dynamicPages(): BelongsTo
    {
        return $this->belongsTo(choice_layout::class);
    }
}
