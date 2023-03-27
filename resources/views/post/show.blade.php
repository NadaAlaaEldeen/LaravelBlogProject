@extends('layouts.app')

@section('title') Show @endsection

@section('content')
    <div class="card  my-4 col-10 offset-1">
        <div class="card-header">
            Post Info
        </div>
        <div class="card-body">
            <h5 class="card-title">Title: {{$post['title']}}</h5>
            <h5 class="card-text">Description: {{$post['description']}}</h5>
        </div>
    </div>

    <div class="card col-10 offset-1">
        <div class="card-header">
            Post Creator Info
        </div>
        <div class="card-body">
            <h5 class="card-title">Name:{{$post->user->name}}</h5>
            <h5 class="card-title">Email:{{$post->user->email}}</h5>
            <h5 class="card-title">Created At:{{$post['created_at']->isoFormat('dddd Do MMMM YYYY HH:mm:ss A')}}</h5>
        </div>
    </div>

    <div class="card my-4 col-10 offset-1">
       
 <div class="accordion accordion-flush " id="accordionFlushExample">

  <div class="accordion-item card-header">

  <div class="input-group mb-3 ">
   <input type="text" class="form-control" placeholder="Enter your comment" aria-label="Enter your comment\
   
   " aria-describedby="button-addon2">
     <button class="btn btn-outline-secondary" type="button" id="button-addon2">Add Comment</button>
     <button class="accordion-button collapsed " type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
        <h6>Comments</h6> 
      </button>
   </div>
    
    
    <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
      <div class="accordion-body">

       <div class="comment py-2">
        <h6 style="display: inline;" class="">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad, saepe amet perferendis, fugiat dolore obcaecati commodi corrupti ab ipsa cum est. Aliquid, cupiditate? Mollitia, cumque accusamus eius maxime debitis natus!</h6> 
        <a href="#" class="btn btn-info">View</a>
        <a href="#" class="btn btn-primary">Edit</a>
        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
         Delete
        </button>
        <sub> created by at </sub>
      </div>

       <div class="comment py-2">
        <h6 style="display: inline;" class="">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad, saepe amet perferendis, fugiat dolore obcaecati commodi corrupti ab ipsa cum est. Aliquid, cupiditate? Mollitia, cumque accusamus eius maxime debitis natus!</h6> 
        <a href="#" class="btn btn-info">View</a>
        <a href="#" class="btn btn-primary">Edit</a>
        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
         Delete
        </button>
        <sub> created by at </sub>
      </div>


    </div>
  </div>
 </div>
        </div>
        
   

@endsection