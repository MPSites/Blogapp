@extends("layouts.app")

@section("content")
    <main class="login-form">
        <div class="cotainer">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Contact us</div>
                        <div class="card-body">
                            <form action="{{ url("/") }}" method="POST">
                                {{ csrf_field() }}
                                <div class="form-group row">
                                    <label for="email_address" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                                    <div class="col-md-6">
                                        <input type="text" id="email_address" class="form-control" name="email" placeholder="example@email.com" autofocus>
                                    </div>
                                </div>
    
                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">Full name</label>
                                    <div class="col-md-6">
                                        <input type="text" id="name" class="form-control" name="name" placeholder="Fill out your name">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="message" class="col-md-4 col-form-label text-md-right">Message</label>
                                    <div class="col-md-6">
                                        <textarea id="message" class="form-control" name="message" cols="5"></textarea>
                                    </div>
                                </div>
    
                                <div class="col-md-6 offset-md-4">
                                    <input type="submit" name="btnLogin" class="form-control btn btn-success" value="Send"/>
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