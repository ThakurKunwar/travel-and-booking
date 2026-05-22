<?php

namespace App\Models;

use App\Traits\HasSlug;
use Illuminate\Database\Eloquent\Model;
use App\Models\Review;
use App\Traits\HasManyMedia;

class Package extends Model
{
    //
    use HasSlug;
    use HasManyMedia;
    protected $fillable = [
        'title',
        'slug',
        'region_id',
        'price',
        'duration_days',
        'description',
        'is_active'
    ];
    public function region()
    {
        return  $this->belongsTo(Region::class);
    }
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
