@extends('layouts.auth')

@section('content')
<section class="py-5">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card shadow-lg border-0 rounded-lg mt-5">
                <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                    <div class="card-body">
                        @if(session()->has('message'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    {{ session()->get('message') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                @endif
                                        <form method="POST" action="{{ route('auth.login.store') }}" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-floating mb-3">
                                            <input class="form-control {{ $errors->has('email') ? 'is-invalid':'' }}" id="inputEmail" type="email" name="email" value="{{ old('email') }}" placeholder="name@example.com" />
                                                <label for="inputEmail">Email address</label>
                                                @error('email')
                                                    <span class="text-danger mt-2 mb-0" role="alert"> 
                                                        {{ $errors->first('email') }}
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-floating mb-3">
                                            <input class="form-control {{ $errors->has('password') ? 'is-invalid':'' }}" id="inputPassword" type="password" name="password"  placeholder="Create a password" />
                                                <label for="inputPassword">Password</label>
                                                @error('password')
                                                    <span class="text-danger mt-2 mb-0" role="alert"> 
                                                        {{ $errors->first('password') }}
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-check mb-3">
                                                <input class="form-check-input" id="inputRememberPassword" name="remember" type="checkbox" value="" />
                                                <label class="form-check-label" for="inputRememberPassword">Remember Password</label>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <a class="small" href="password.html">Forgot Password?</a>
                                                <button class="btn btn-primary" type="submit">Login</a>
                                            </div>
                                        </form>
                    </div>
                <div class="card-footer text-center py-3">
                    <div class="small"><a href="{{ route('auth.register') }}">Need an account? Register here!</a></div>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
<br>
<br>
<br>
<br>
@stop

