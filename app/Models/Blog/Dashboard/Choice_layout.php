<?php

namespace App\Models\Blog\Dashboard;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Choice_layout extends Model
{
    public function uploadImages(): BelongsToMany
    {
        return $this->belongsToMany(Upload_image::class);
    }
}
