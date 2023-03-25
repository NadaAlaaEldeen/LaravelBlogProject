<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use Illuminate\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Http\StorePostRequest;

class PostController extends Controller
{
    public function index()
    {
        $allPosts=Post::all();
        return PostResource::collection($allPosts);
    }
    public function show($id)
    {
        $post=Post::find($id);
        // return $post;
        // return [
        //   'id'=>$post->id,
        //   'title'=>$post->title,
        // 'description'=>$post->description,
        // ];
        return new PostResource($post);
    }
    public function store(StorePostRequest $request)
    {
        $title=$request->title;
        $description=$request->description;
        $post_creator=$request->post_creator;

        $post=Post::create_function([
            'title'=>$title,
            'description'=>$description,
            'user_id'=>$post_creator,
          
        ]);
        return new PostResource($post);
    }
}
