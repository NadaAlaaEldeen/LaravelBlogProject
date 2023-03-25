@extends('layouts.form')

@section('title') Create new post @endsection

@section('btn') btn btn-success  @endsection

@section('btn-name') create  @endsection

@section('formaction') {{route('posts.store')}} @endsection


