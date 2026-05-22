<?php

namespace App\Models;

use App\Traits\HasSlug;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasSlug;
    //
    protected $fillable = [
        'title',
        'slug',
        'body',
        'published_at'
    ];

    protected $casts = [
        'published_at' => 'datetime'
    ];
}
