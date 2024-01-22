<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;

class PostsController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json([
            "posts" => [
                "title" => "Post One",
                "body" => "This is the first post"
            ]
        ]);
    }
}
