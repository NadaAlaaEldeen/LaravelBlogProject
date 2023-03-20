@extends('layouts.form')

@section('title') update post @endsection

@section('btn') btn btn-primary  @endsection

@section('btn-name') update  @endsection
@section('post-title') {{$post['title']}}  @endsection
@section('post-desc')  {{$post['posted_by']}} @endsection
@section('post-creator') {{$post['created_at']}} @endsection

@section('action') {{route('posts.show', ['post' => $post['id']])}} @endsection



