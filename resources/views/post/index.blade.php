@extends('layouts.app')

@section('title') Index @endsection

@section('content')
    <div class="text-center col-10 offset-1">
        <button type="button" class="mt-4 btn btn-success">
        <a href="{{route('posts.create')}}" class="text-light text-decoration-none"> 
        Create Post
        </a>
        </button>
    </div>
    <table class="table mt-4 ">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Posted By</th>
            <th scope="col">Created At</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>

        @foreach($posts as $post)
            <tr>
                <td>{{$post['id']}}</td>
                <td>{{$post['title']}}</td>
                <td>{{$post->user->name}}</td>
                <td>{{$post['created_at']->format('Y-m-d')}}</td>
                <td>
                    <a href="{{route('posts.show', $post['id'])}}" class="btn btn-info">View</a>
                    <a href="{{route('posts.edit', $post['id'])}}" class="btn btn-primary">Edit</a>
                    <!-- <a href="#" class="btn btn-danger">Delete</a> -->
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Delete
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel"> Delete confirmation </h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        Are you sure you want to delete post with id : {{$post['id']}}
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                         <form  style="display:inline;" method="POST" action="{{route('posts.destroy',['post'=> $post->id])}}"> 
                         @csrf 
                         @method('delete')
                         <button type="submit" class="btn btn-primary" action="">Confirm</button>
                         </form>     
                        </div>
                        </div>
                    </div>
                    </div>
                                    </td>
                                </tr>
                            @endforeach
        </tbody>  
    </table>
<!-- {{ $posts->links('vendor.pagination.bootstrap-4')}} --><!-- 1 2 3 -->
<!-- {{ $posts->links('vendor.pagination.simple-bootstrap-4')}} --> <!-- Previous  Next -->
{{ $posts->links('vendor.pagination.custom')}}
<!-- {!! $posts->render() !!} -->
@endsection
