<?php

namespace App\Traits;

use App\Models\Media;

trait HasOneMedia
{
    //
    public function media()
    {
        return $this->morphOne(Media::class, 'mediaable');
    }
}
