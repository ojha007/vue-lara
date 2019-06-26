<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Models\Reply;
use Illuminate\Http\Request;

class ReplyController extends Controller
{

    public function __construct()
    {

        $this->middleware('JWT', ['except' => ['getReplyByQuestionSlug', 'show']]);
    }

    public function setReplyByQuestionSlug(Request $request)
    {

        $request->validate([
            'title' => 'required',
        ]);
         auth()->user()
            ->replies()
            ->create([
                'body' => $request->title,
                'question_id' => $request->question_id
            ]);


    }


    public function getReplyByQuestionSlug(Question $question)
    {
        return $question->reply;
    }


    public function edit(Reply $reply)
    {
        //
    }


    public function update(Request $request, Reply $reply)
    {
        //
    }


    public function destroy(Reply $reply)
    {
        //
    }
}
