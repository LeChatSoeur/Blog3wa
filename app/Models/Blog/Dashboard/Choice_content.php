<?php

namespace App\Models\Blog\Dashboard;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Choice_content extends Model
{
    public function slug(): BelongsTo
    {
        return $this->belongsTo(Slug::class);
    }
}
