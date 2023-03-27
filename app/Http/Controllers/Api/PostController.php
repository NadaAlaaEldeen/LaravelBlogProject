<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\Storage;
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
        $slug=$request->slug;

        $post=Post::create_function([
            'title'=>$title,
            'description'=>$description,
            'user_id'=>$post_creator,
            'slug'=>$slug,
          
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = $image->getClientOriginalName();
            $path = Storage::putFileAs('public/posts', $image, $filename);
            $post->image = $path;
            $post->save();
        }

        return new PostResource($post);
    }
}
