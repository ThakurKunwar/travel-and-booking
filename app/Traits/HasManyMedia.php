<?php

namespace App\Traits;

use App\Models\Media;

trait HasManyMedia
{
    public function media()
    {
        return $this->morphMany(Media::class, 'mediaable');
    }
}
