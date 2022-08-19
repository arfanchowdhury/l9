@extends('layouts.dashboard')

@section('content')

    <div class="container-fluid px-4">
        <h1 class="mt-2">Category</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                <li class="breadcrumb-item active">Category</li>
                <li class="breadcrumb-item active">Create</li>
            </ol>
    </div>

    <div class="row justify-content-center">
                            <div class="col-lg-6">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Create Category</h3></div>
                                    <div class="card-body">
                                        <form method="POST" action="{{ route('categories.store') }}" enctype="multipart/form-data">
                                            @csrf
                                           
                                            <div class="form-floating mb-2">
                                                <input class="form-control {{ $errors->has('title') ? 'is-invalid':'' }}" id="inputTitle" type="text" name="title" value="{{ old('title') }}" placeholder="Enter title" />
                                                <label for="inputTitle">Title </label>
                                                @error('title')
                                                    <span class="text-danger mt-2 mb-0" role="alert"> 
                                                        {{ $errors->first('title') }}
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="form-floating">
                                                <select class="form-select" id="selectParentId" name="parent_id" >
                                                    <option value="" >Select Parent Category</option>
                                                        @foreach($categories as $category)
                                                            <option value="{{ $category->id }}">{{ $category->title }}</option>
                                                        @endforeach
                                                </select>
                                                <label for="selectParentId">Parent Categories List</label>
                                                @error('parent_id')
                                                    <span class="text-danger mt-2 mb-0" role="alert"> 
                                                        {{ $errors->first('parent_id') }}
                                                    </span>
                                                @enderror
                                            </div>

                                          
                                            <div class="form-check mb-3">
                                                <input class="form-check-input" id="inputStatus" name="status" type="checkbox" value="0" />
                                                <label class="form-check-label" for="inputStatus">Status</label>
                                                @error('status')
                                                    <span class="text-danger mt-2 mb-0" role="alert"> 
                                                        {{ $errors->first('status') }}
                                                    </span>
                                                @enderror
                                            </div>
                                           

                                            <div class="mt-3 mb-0">
                                                <div class="d-grid"><button class="btn btn-primary btn-block" type="submit">Create Category</button></div>
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