<?php

namespace App\Http\Controllers\Api;

use App\Events\StatusLiked;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class LikesController extends Controller
{
    public function Liked(Request $request)
    {

        $username =$request->user('api');


        event(new StatusLiked($username));

    }

    public function UnLiked()
    {

    }


}
