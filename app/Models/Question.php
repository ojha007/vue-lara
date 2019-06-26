<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{

    public $fillable=[
        'title',
        'body',
        'slug',
        'category_id',
        'user_id',
    ];
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function like()
    {
        return $this->hasMany(Likes::class);
    }


    public function reply()
    {
        return $this->hasMany(Reply::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getUrlAttribute(){
        return asset('api/v1/question/'.$this->slug);
    }

}
