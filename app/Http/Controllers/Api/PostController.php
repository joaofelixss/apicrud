<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();
        return PostResource::collection($posts);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        $post = Post::create($request->validate());
        return new PostResource($post);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StorePostRequest $request, Post $post)
    {
        $post->update($request->validated());
        return new PostResource($post);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
