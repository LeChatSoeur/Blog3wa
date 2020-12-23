<?php

namespace App\Models\Blog\Dashboard;

use App\Models\Blog\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Slug extends Model
{

    public function post(): HasOne
    {
        return $this->hasOne(Post::class);
    }

    public function choice_layout(): HasOne
    {
        return $this->hasOne(Choice_layout::class);
    }

    public function choice_Content(): HasOne
    {
        return $this->hasOne(Choice_content::class);
    }
}
