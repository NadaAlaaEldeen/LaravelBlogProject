<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\HtmlString;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Support\Str;
use App\jobs\PruneOldPostsJob;
use Illuminate\Support\Facades\Storage;
use League\Flysystem\WhitespacePathNormalizer;
use Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull;

class PostController extends Controller
{
    //method return all posts
    public function index()
    {
      
        // select * from posts
        $allPosts=Post::paginate(5);
        // $allPosts=Post::cursorPaginate(3);
        // $allPosts=Post::simplePaginate(3);
        PruneOldPostsJob::dispatch();
        return view('post.index', ['posts' => $allPosts]);
        
    }


    public function show($id)//method return single post
    {
     //        dd($id);

      //dynamic data
      $post=Post::find($id);//select *from posts where id=1 limit 1
    //$post=Post::where('id'=$id)-> get(); //collection object .....select * from posts where id=1;
        return view('post.show', ['post' => $post]);
    }
   

    //create new post 
    public function create()
    {
        $users=User::all();
        
        return view('post.create',['users' =>$users]);
    }
    
    
    public function edit(Request $request,$id)
    { 
        $posts=Post::find($id);
        $users=User::All();
         
        return view('post.update', ['post' => $posts,'users'=>$users]);
       
    }

    public function update($post,Request $request)
    {
        $post=Post::find($post);
        
        if ($request->hasFile('image')) {
            if ($post->image) {
                Storage::delete($post->image);
            }
            $image = $request->file('image');
            $filename = $image->getClientOriginalName();
            $path = Storage::putFileAs('public/posts', $image, $filename);
            $post->image = $path;
        }
    
        $post->update([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'description' => $request->description,
            'user_id' => $request->post_creator,
        ]);
    

            $post->save();
           
    return redirect()->route('posts.index');
   }
    
    public function destroy($post)
    {
     Post::where('id',"$post")->delete();
     return redirect()->route('posts.index');
    }
    
    
    public function store(Request $request)
    {
     //validate input data
     $request->validate([
        'title'=>['required','min:3','unique:posts,title'],
        'description'=>['required','min:10'],
        'post_creator' => ['required','exists:users,id'],
        'image'=> ['mimes:jpeg,png']
    ]);

    //get data from the form
    $data = request()->all();
     //insert the data in data base
    $post=Post::create([
       'title' =>$request->title,
        'description' =>$request->description, 
         'user_id' =>$request->post_creator,
         'slug'=>$request->slug,
    ]);

    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $filename = $image->getClientOriginalName();
        $path = Storage::putFileAs('public/posts', $image, $filename);
        $post->image = $path;
        $post->save();
    }
    //redirect to index action
    //return to_route('posts.index');
      return redirect()->route('posts.index');
    }  

//----------------------------------------------------------------- 
public function removeOldPosts()
    {
        PruneOldPostsJob::dispatch();
        return to_route('posts.index');
    }
}
