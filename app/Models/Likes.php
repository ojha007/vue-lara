<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Likes extends Model
{
    protected $table = ['likes'];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function question(){
        return $this->belongsTo(Question::class);
    }
    public  function reply(){
        return $this->belongsTo(Reply::class);
    }
}
