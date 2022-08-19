@extends('layouts.auth')

@section('content')
<section class="py-5">
<div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Create Account</h3></div>
                                    <div class="card-body">
                                        <form method="POST" action="{{ route('auth.register.store') }}" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row mb-2">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-2 mb-md-0">
                                                        <input class="form-control {{ $errors->has('first_name') ? 'is-invalid':'' }}" id="inputFirstName" type="text" name="first_name" value="{{ old('first_name') }}" placeholder="Enter your first name" />
                                                        <label for="inputFirstName">First name</label>
                                                        @error('first_name')
                                                            <span class="text-danger mt-2 mb-0" role="alert"> 
                                                                {{ $errors->first('first_name') }}
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                        <input class="form-control {{ $errors->has('last_name') ? 'is-invalid':'' }}" id="inputLastName" type="text" name="last_name" value="{{ old('last_name') }}" placeholder="Enter your last name" />
                                                        <label for="inputLastName">Last name</label>
                                                        @error('last_name')
                                                            <span class="text-danger mt-2 mb-0" role="alert"> 
                                                                {{ $errors->first('last_name') }}
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-floating mb-2">
                                                <input class="form-control {{ $errors->has('email') ? 'is-invalid':'' }}" id="inputEmail" type="email" name="email" value="{{ old('email') }}" placeholder="name@example.com" />
                                                <label for="inputEmail">Email address</label>
                                                @error('email')
                                                    <span class="text-danger mt-2 mb-0" role="alert"> 
                                                        {{ $errors->first('email') }}
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-2 mb-md-0">
                                                        <input class="form-control {{ $errors->has('password') ? 'is-invalid':'' }}" id="inputPassword" type="password" name="password"  placeholder="Create a password" />
                                                        <label for="inputPassword">Password</label>
                                                        @error('password')
                                                            <span class="text-danger mt-2 mb-0" role="alert"> 
                                                                {{ $errors->first('password') }}
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-2 mb-md-0">
                                                        <input class="form-control {{ $errors->has('password_confirmation') ? 'is-invalid':'' }}" id="inputPasswordConfirm" type="password" name="password_confirmation" placeholder="Confirm password" />
                                                        <label for="inputPasswordConfirm">Confirm Password</label>
                                                        @error('password_confirmation')
                                                            <span class="text-danger mt-2 mb-0" role="alert"> 
                                                                {{ $errors->first('password_confirmation') }}
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mt-3 mb-0">
                                                <div class="d-grid"><button class="btn btn-primary btn-block" type="submit">Create Account</button></div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="{{ route('auth.login') }}">Have an account? Go to login</a></div>
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
<br>
@stop