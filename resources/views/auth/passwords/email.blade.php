


@extends('layouts.auths')
@section('title')
@endsection
<title> Reset Password </title>
@section('content')
<body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Reset Password</h3></div>
                                    <div class="card-body">
                                        <form action= "{{ route('password.email') }}" method="POST">

                                        @csrf
                                        @if (session('status'))
                                        <div class="alert alert-success" role="alert">
                                            {{ session('status') }}
                                        </div>
                                        @endif
                                        

                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputEmail" type="email" name="email" placeholder="name@example.com" />
                                                <label for="inputEmail">Email address</label>
                                            </div>
                                          
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <a class="small" href="{{route('login')}}">Login Instead?</a>
                                                <button class="btn btn-primary" type="submit">Send Password Reset Link</button>
                                            </div>
                                        </form>
                                    </div>
                                    
                                 

                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
@endsection
