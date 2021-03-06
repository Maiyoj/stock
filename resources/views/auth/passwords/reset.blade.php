
@extends('layouts.auths')
@section('title')
@endsection
<title> Reset Password</title>
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
                                        <form action= "{{ route('password.update') }}" method="POST">

                                        @csrf
                                        <input type="hidden" name="token" value="{{ $token }}">

                                      
                                        @if($errors->any())
                                        @foreach($errors->all() as $item)
                                        <div class="alert alert-danger">

                                        {{$item}}
                                       </div>
                                       @endforeach
                                        @endif
                                        

                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputEmail" type="email" name="email" placeholder="name@example.com" />
                                                <label for="inputEmail">Email address</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputPassword" type="password"  name="password"  placeholder="Password" />
                                                <label for="inputPassword">Password</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="password-confirm" type="password"  name="password_confirmation" required autocomplete="new-password">
                                                <label  for="password-confirm">Confirm Password</label>
                                            </div>
                
                                       
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                
                                                <button class="btn btn-primary" type="submit">Update Password</button>
                                            </div>
                                        </form>
                                    </div>
                                    
                                     <!-- <div class="card-footer text-center py-3"> -->
                                        <!-- <div class="small"><a href="register.html">Need an account? Sign up!</a></div> -->
                                    <!-- </div> -->

                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
@endsection
