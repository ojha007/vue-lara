<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $table = 'blogs';
    protected $fillable = [
        'title',
        'slug',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function reply()
    {
        return $this->belongsTo(Reply::class);
    }

    public function likes()
    {
        return $this->belongsTo(Likes::class);
    }

    public function getUrlAttribute()
    {
        return asset('api/v1/blog/' . $this->slug);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
