<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait HasSlug
{
    public static function bootHasSlug(): void
    {
        static::creating(function ($model) {
            $model->slug = static::generateUniqueSlug($model->slug ?? $model->{static::getSlug()});
        });

        static::updating(function ($model) {
            if ($model->isDirty(static::getSlug())) {
                $model->slug = static::generateUniqueSlug($model->{static::getSlug()}, $model->id);
            }
        });
    }

    protected static function getSlug(): string
    {
        $model = new static();
        $fillable = $model->getFillable();

        if (in_array('title', $fillable)) return 'title';
        if (in_array('name', $fillable)) return 'name';

        throw new \Exception("No slug source found on " . static::class);
    }
    protected static function generateUniqueSlug(string $value, ?int $ignoreId = null): string
    {
        $slug = Str::slug($value);
        $original = $slug;
        $count = 1;

        while (
            static::where('slug', $slug)
            ->when($ignoreId, fn($q) => $q->where('id', '!=', $ignoreId))
            ->exists()
        ) {
            $slug = $original . '-' . $count++;
        }

        return $slug;
    }
}
