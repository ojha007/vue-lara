<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\BlogResource;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BlogController extends Controller
{

    public function __construct()
    {

        $this->middleware('JWT', ['except' => ['index', 'show']]);
    }

    public function index()
    {

        return BlogResource::collection(Blog::latest()->paginate(20));
    }


    public function store(Request $request)
    {

    }


    public function show(Blog $blog)
    {
        return new BlogResource($blog);
    }


    public function update(Request $request, Blog $blog)
    {

    }


    public function destroy(Blog $blog)
    {
        $blog->delete();
        $response = [
            'status' => Response::HTTP_OK,
            'message' => 'Deleted Successfully',
        ];
        return $response;
    }
}
