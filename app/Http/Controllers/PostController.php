<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\DB;
// use Illuminate\Support\HtmlString;
class PostController extends Controller
{
    //method return all posts
    public function index()
    {
      
        // select * from posts
        $allPosts=Post::paginate(5);
        // $allPosts=Post::cursorPaginate(3);
        // $allPosts=Post::simplePaginate(3);

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
        $Post=Post::find($post);
        $Post->update([
            'title'=>$request->title,
            'description'=>$request->description,
        ]);
        return redirect()->route('posts.index');
    }    
    public function destroy($post)
    {
     Post::where('id',"$post")->delete();
     return redirect()->route('posts.index');
    }    
    public function store(Request $request)
    {
    //get data from the form
    $data = request()->all();
     //insert the data in data base
    Post::create([
       'title' =>$request->title,
        'description' =>$request->description, 
         'user_id' =>$request->post_creator,
    ]);
    //redirect to index action
    //return to_route('posts.index');
      return redirect()->route('posts.index');
    }  

//----------------------------------------------------------------- 
}