<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PlanTrek extends Model
{
    protected $guarded = [
        'is_read'
    ];

    public function region()
    {
        return $this->belongsTo(Region::class);
    }
    public function casts()
    {
        return [
            'preferable_date' => 'date'
        ];
    }
}
