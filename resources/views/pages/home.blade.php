@extends('layouts.app')
@section('content')
    <div class="jumbotron text-center">
        @if(session('msg'))
            <h1>{{ session('msg')}}</h1>
            @if(session('status') === 'true')
                <p><a class="btn btn-primary btn-lgn" href="{{ url("/blog") }}" role="button">Go to Blog</a></p>
            @elseif(session('status') === 'false')
                <p><a class="btn btn-primary btn-lgn" href="{{ url("/login") }}" role="button">Try again</a></p>
            @elseif(session('status') === '403')
                <p>Warning: Don't try this again</p>
                <p><a class="btn btn-primary btn-lgn" href="{{ url("/") }}" role="button">Go Back</a></p>
            @elseif(session('status') === 'logout')
                <p>We hope u enjoyed your stay</p>
            @endif    
        @else
            <h1>Welcome to Blogapp</h1>
            <p>This is a school project for the subject PHP level 2 - Blog application made in Laravel 5.8</p>
            <p><a class="btn btn-success btn-lgn" href="{{ url("/blog") }}" role="button">Welcome</a></p>
        @endif  
    </div>
@endsection