<?php

namespace App\Models;

use App\Models\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Blog extends Model
{

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    
    public function posts(): BelongsToMany
    {
        return $this->belongsToMany(Post::class);
    }
}
