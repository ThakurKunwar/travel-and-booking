<?php

namespace App\Models;

use App\Traits\HasOneMedia;
use App\Traits\HasSlug;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    //
    use HasSlug;
    use HasOneMedia;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'is_active'
    ];
    public function packages()
    {
        return $this->hasMany(Package::class);
    }
}
