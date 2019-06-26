<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\QuestionRequest;
use App\Http\Resources\QuestionResource;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class QuestionController extends Controller
{
    public function __construct()
    {

        $this->middleware('JWT', ['except' => ['index', 'show']]);
    }

    public function index()
    {
        return QuestionResource::collection(Question::latest()->paginate(20));
    }


    public function store(QuestionRequest $request)
    {

        $store = auth()->user()
            ->question()
            ->create(
                [
                    'title' => $request->title,
                    'slug' => str_slug($request->title),
                    'category_id' => $request->category_id,
                    'body' => $request->body
                ]
            );
        if ($store) {
            return $response = [
                'status' => Response::HTTP_CREATED,
                'message' => 'Question Store SuccessFully .'
            ];
        }

        return $response = [
            'status' => Response::HTTP_FORBIDDEN,
            'message' => 'Something went Wrong',
        ];


    }


    public function show(Question $question)
    {
        return new QuestionResource($question);
    }


    public function update(Request $request, Question $question)
    {
        $question->update($request->all());
        $response = [
            'message' => 'Updated Successfully',
            'status' => Response::HTTP_ACCEPTED,
        ];
        return $response;
    }


    public function destroy(Question $question)
    {

        $deleteQuestion = $question->delete();
        if ($deleteQuestion) {
            $response = [
                'message' => 'Deleted SuccessFully',
                'status' => Response::HTTP_OK,
            ];
        } else {
            $response = [
                'message' => 'Something Went Wrong',
                'status' => 400
            ];
        }

        return $response;
    }
}
