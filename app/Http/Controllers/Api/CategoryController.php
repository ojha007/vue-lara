<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CategoryController extends Controller
{


    public function __construct()
    {

        $this->middleware('JWT', ['except' => ['index', 'show', 'questionByCategory']]);
    }

    public function index()
    {
        return Category::latest()->paginate(20);
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:5|max:191|unique:categories'
        ]);

        Category::create([
            'title' => $request->title,
            'slug' => $request->title,
        ]);

        $response = [
            'status' => Response::HTTP_CREATED,
            'message' => 'Created SuccessFully',
        ];
        return $response;

    }


    public function show(Category $category)
    {
        return $category;
    }


    public function update(Request $request, Category $category)
    {
        $category->update($request->all());
        $response = [
            'status' => Response::HTTP_OK,
            'message' => 'Updated SuccessFully',
        ];
        return $response;
    }


    public function destroy(Category $category)
    {
        $category->delete();
        $response = [
            'status' => Response::HTTP_OK,
            'message' => ' Deleted SuccessFully',
        ];
        return $response;

    }

    public function questionByCategory(Category $category)
    {
        $question = $category->question;
        return $question;
//        return new QuestionResource($question);

    }
}
