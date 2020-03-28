@extends("layouts.app")

@section("content")
    <main class="login-form">
        <div class="cotainer">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Edit post</div>
                        <div class="card-body">
                            <form action="{{ url("/post/{$post->post_id}") }}" method="POST">
                                {{ csrf_field() }}
                                <input type="hidden" name="_method" value="PUT">
                                
                                <div class="form-group row">
                                    <label for="title" class="col-md-4 col-form-label text-md-right">Title:</label>
                                    <div class="col-md-6">
                                        <input type="text" id="title" class="form-control" name="title" value="{{ $post->title }}" autofocus>
                                    </div>
                                </div>
    
                                <div class="form-group row">
                                    <label for="details" class="col-md-4 col-form-label text-md-right">Details:</label>
                                    <div class="col-md-6">
                                        <textarea id="details" class="form-control" name="details" cols="3">{{ $post->details }}</textarea>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="text" class="col-md-4 col-form-label text-md-right">Text:</label>
                                    <div class="col-md-6">
                                        <textarea id="text" class="form-control" name="text" cols="5">{{ $post->text }}</textarea>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="category" class="col-md-4 col-form-label text-md-right">Category:</label>
                                    <div class="col-md-6">
                                        <select name="category" class="form-control">
                                            <option value="0">...</option>
                            
                                            @isset($categories)
                                                @foreach($categories as $cat)
                                                    <option
                                                            value="{{ $cat->category_id }}"
                            
                                                            @if(old('category')==$post->category_id)
                                                            selected="selected"
                                                            @endif
                            
                                                    >
                                                        {{ $cat->category_name }}
                                                    </option>
                                                @endforeach
                                            @endisset
                            
                                        </select>
                                    </div>
                                </div>
    
                                <div class="col-md-6 offset-md-4">
                                    <input type="submit" name="btnPost" class="form-control btn btn-primary" value="Submit"/>
                                </div>
                        </div>
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
        </div>
    
    </main>
@endsection