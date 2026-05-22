<?php

namespace App\Models;


use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    //

    protected $fillable = [
        'user_id',
        'package_id',
        'rating',
        'body'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function package()
    {
        return $this->belongsTo(Package::class);
    }
}
