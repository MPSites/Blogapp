@extends('layouts.app')

@section('content')
    <div class="jumbotron">
        <h1><em>{{$post->title}}</em></h1>
        <p>{{$post->text}}</p>
        <hr>
        <div>
            <span class="badge badge-secondary">Posted {{$post->added_on}}</span><span> by {{$post->name}} </span><div class="float-right"><span class="badge badge-info">story</span> <span class="badge @if($post->category_id == 2) badge-danger @elseif($post->category_id == 3) badge-success @else badge-primary @endif">{{$post->category_name}}</span></div>         
        </div>
    </div>
    <a href="/blog" class="btn btn-primary">Go Back</a>
@endsection