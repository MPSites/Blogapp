@extends('layouts.app')

@section('content')
    <div class="container">
        <div id="heading-img" class="jumbotron p-4 p-md-5 text-white rounded">
        <div class="col-md-6 px-0">
            <h1 class="display-4 font-italic">{{$top_post->title}}</h1>
            <p class="lead my-3">{{$top_post->details}}</p>
            <p class="lead mb-0"><a href="/post/{{$top_post->post_id}}" class="text-white font-weight-bold">Continue reading...</a></p>
        </div>
        </div>
        
        
        <div class="row mb-2">
            @foreach ($top_posts as $row)
                <div class="col-md-6">
                    <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                        <div class="col p-4 d-flex flex-column position-static">
                            <strong class="d-inline-block mb-2 @if($row->category_id == 2) text-danger @elseif($row->category_id == 3) text-success @else text-primary @endif">{{$row->category_name}}</strong>
                            <h4 class="mb-0"> {{$row->title}} </h4>
                            <div class="mb-1 text-muted"> {{$row->added_on}} </div>
                            <p class="card-text mb-auto">Latest post updates</p>
                            <a href="/post/{{$row->post_id}}" class="stretched-link">Continue reading...</a>
                        </div>
                        <div class="col-auto d-none d-lg-block">
                            <svg class="bd-placeholder-img @if($row->category_id == 2) placeholder-img2 @elseif($row->category_id == 3) placeholder-img3  @endif" width="200" height="250" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"></svg>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    
    <main role="main" class="container">
        <div class="row">
        <div class="col-md-8 blog-main">
            <h3 class="pb-4 mb-4 font-italic border-bottom">
            Recent posts
            </h3>
            
            <div id="post-area">
                <!-- blog post-->
                @foreach($posts as $post)
                <div class="blog-post">
                    <h2 class="blog-post-title">{{$post->title}}</h2>
                    <p class="blog-post-meta">{{$post->added_on}} by <em class="bl">{{$post->name}}</em></p>
        
                    <p>{{$post->details}}</p>
                    <a href="/post/{{$post->post_id}}" name="posts">Continue reading</a>
                    <hr>
                </div> 
                @endforeach
                <!-- /.blog-post -->
            </div>
            
 
            
            <nav>
                {{ $posts->fragment('posts')->render() }}
            </nav>
    
        </div><!-- /.blog-main -->
    
        <aside class="col-md-4 blog-sidebar">
            <div class="p-4 mb-3 bg-light rounded">
            <h4 class="font-italic">About</h4>
            <p class="mb-0">Blogapp<em> is a blog application that was made for the school subject of PHP level 2, made in Laravel 5.8 it should represent and have all functionalities of a modern blog, focusing on news and stories about design, food and world mostly, welcome and enjoy.</em></p>
            </div>
    
            <div class="p-4">
            <h4 class="font-italic">Categories</h4>
            <ol class="list-unstyled mb-0">
                @foreach ($categories as $row)
                    <li><a class="cat_link" href="#" data-id="{{$row->category_id}}">{{$row->category_name}}</a></li>
                @endforeach
                
            </ol>
            </div>
    
            <div class="p-4">
            <h4 class="font-italic">Elsewhere</h4>
            <ol class="list-unstyled">
                <li><a href="https://www.twitter.com" target="_blank">Twitter</a></li>
                <li><a href="https://www.facebook.com" target="_blank">Facebook</a></li>
            </ol>
            </div>
        </aside><!-- /.blog-sidebar -->
    
        </div><!-- /.row -->
    
    </main><!-- /.container -->
    
@endsection

@section("javascript")
    @parent
    <script>
        const BASE_URL = "{{ url("/") }}";
    </script>
    <script type="text/javascript" src="{{ asset("/js/main.js") }}"></script>
@endsection