@extends('layouts.dashboard')

@section('content')

    <div class="container-fluid px-4">
        <h1 class="mt-2">Role</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                <li class="breadcrumb-item active">Role</li>
                <li class="breadcrumb-item active">Edit</li>
            </ol>
    </div>

    <div class="row justify-content-center">
                            <div class="col-lg-6">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Edit Role</h3></div>
                                    <div class="card-body">
                                        <form method="POST" action="{{ route('roles.update', $role->id) }}" enctype="multipart/form-data">
                                            @csrf
                                            @method('PATCH')
                                            <div class="form-floating mb-2">
                                                <input class="form-control {{ $errors->has('title') ? 'is-invalid':'' }}" id="inputTitle" type="text" name="title" value="{{ $role->title }}" placeholder="Enter title" />
                                                <label for="inputTitle">Title </label>
                                                @error('title')
                                                    <span class="text-danger mt-2 mb-0" role="alert"> 
                                                        {{ $errors->first('title') }}
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="form-check mb-3">
                                                <input class="form-check-input" id="inputStatus" name="status" type="checkbox" value="{{ $role->status ? 1:0 }}" {{ $role->status ? 'checked':'' }}/>
                                                <label class="form-check-label" for="inputStatus">Status</label> : {{ $role->status ? 'Active':'Inactive'}}
                                                @error('status')
                                                    <span class="text-danger mt-2 mb-0" role="alert"> 
                                                        {{ $errors->first('status') }}
                                                    </span>
                                                @enderror
                                            </div>
                                           

                                            <div class="mt-3 mb-0">
                                                <div class="d-grid"><button class="btn btn-primary btn-block" type="submit">Create Role</button></div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

@stop