@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                <div class="card-body">
                    <span class="float-right">Hi, {{auth()->user()->name}} Welcome back!</span>
                    <a href="/createPost" class="btn btn-primary">Create post</a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h3>Your blog posts</h3>

                @if(count($posts) > 0)
                    <table class="table table-striped">
                        <tr>
                            <th>Title</th>
                            <th>Added on</th>
                            <th colspan="2" class="tx-center">Actions</th>
                        </tr>
                    @foreach ($posts as $post)
                        <tr>
                            <td>{{$post->title}}</td>
                            <td>{{$post->added_on}}</td>
                            <td><a href="/editPost/{{$post->post_id}}" class="btn btn-warning">Edit</a></td>
                            <td>
                                <form action="{{ url("/post/{$post->post_id}") }}" method="POST">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="submit" name="btnPost" class="btn btn-danger" value="Delete"/>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </table>
                    <nav>
                        {{ $posts->fragment('posts')->render() }}
                    </nav>
                @else
                    <p>You have no posts</p>
                @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
