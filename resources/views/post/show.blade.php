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
        <div class="card-header">
            comments
        </div>
        <div class="card-body">
            <h5 class="card-title">Special title treatment</h5>
            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
        </div>
    </div>

@endsection