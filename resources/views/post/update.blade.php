@extends('layouts.form')

@section('title') update post @endsection

@section('action') @method('PUT') @endsection

@section('btn') btn btn-primary  @endsection

@section('btn-name') update  @endsection

@section('post-title') {{$post->title}}  @endsection
@section('post-desc')  {{$post->description}} @endsection
@section('post-creator') {{$post->user->name}} @endsection

@section('formaction') {{route('posts.update', ['post' => $post['id']])}} @endsection



