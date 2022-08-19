@extends('layouts.dashboard')

@section('content')
<section class="py-5">
<div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-6">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Change Password</h3></div>
                                    <div class="card-body">
                                        @if(session()->has('message'))
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                {{ session()->get('message') }}
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                            </div>
                                        @endif
                                        <form method="POST" action="{{ route('auth.update.password') }}">
                                            @csrf
                                            <div class="form-floating mb-3">
                                                <input class="form-control {{ $errors->has('old_password') ? 'is-invalid':'' }}" id="inputOldPassword" type="old_password" name="old_password"  placeholder="Old password" />
                                                <label for="inputOldPassword">Old Password</label>
                                                @error('old_password')
                                                    <span class="text-danger mt-2 mb-0" role="alert"> 
                                                        {{ $errors->first('old_password') }}
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="form-floating mb-3">
                                                <input class="form-control {{ $errors->has('password') ? 'is-invalid':'' }}" id="inputPassword" type="password" name="password"  placeholder="New password" />
                                                <label for="inputPassword">New Password</label>
                                                @error('password')
                                                    <span class="text-danger mt-2 mb-0" role="alert"> 
                                                        {{ $errors->first('password') }}
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="form-floating mb-3">
                                                <input class="form-control {{ $errors->has('password_confirmation') ? 'is-invalid':'' }}" id="inputPasswordConfirm" type="password" name="password_confirmation" placeholder="Confirm password" />
                                                <label for="inputPasswordConfirm">Confirm Password</label>
                                                @error('password_confirmation')
                                                    <span class="text-danger mt-2 mb-0" role="alert"> 
                                                        {{ $errors->first('password_confirmation') }}
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="d-flex align-items-end justify-content-end mt-4 mb-0">
                                                <button class="btn btn-primary" type="submit">Change Password</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        
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