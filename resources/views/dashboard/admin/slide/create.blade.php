@extends('layouts.dashboard')

@section('content')

    <div class="container-fluid px-4">
        <h1 class="mt-2">Slide</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                <li class="breadcrumb-item active">Slide</li>
                <li class="breadcrumb-item active">Create</li>
            </ol>
    </div>

    <div class="row justify-content-center">
                            <div class="col-lg-6">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Create Slide</h3></div>
                                    <div class="card-body">
                                        <form method="POST" action="{{ route('slides.store') }}" enctype="multipart/form-data">
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

                                            <div class="form-floating mb-2">
                                                <textarea class="form-control {{ $errors->has('description') ? 'is-invalid':'' }}" name="description" value="{{ old('description') }}" placeholder="Enter Description" id="inputDescription"></textarea>
                                                <label for="inputDescription">Description</label>
                                                @error('description')
                                                    <span class="text-danger mt-2 mb-0" role="alert"> 
                                                        {{ $errors->first('description') }}
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="form-floating  mb-2">
                                                <input type="number" id="inputSerial" name="serial" value="{{ old('serial') }}" class="form-control {{ $errors->has('serial') ? 'is-invalid':'' }}" step="1" min="1" pattern="^[-/d]/d*$">
                                                <label for="inputSerial">Serial</label>
                                                @error('serial')
                                                    <span class="text-danger mt-2 mb-0" role="alert"> 
                                                        {{ $errors->first('serial') }}
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="form-floating  mb-2">
                                                <input type="file" name="image" class="form-control {{ $errors->has('image') ? 'is-invalid':'' }}" >
                                                @error('image')
                                                    <span class="text-danger mt-2 mb-0" role="alert"> 
                                                        {{ $errors->first('image') }}
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="form-check mb-3">
                                                <input class="form-check-input {{ $errors->has('status') ? 'is-invalid':'' }}" id="inputStatus" name="status" type="checkbox" value="1" />
                                                <label class="form-check-label" for="inputStatus">Status</label>
                                                @error('status')
                                                    <span class="text-danger mt-2 mb-0" role="alert"> 
                                                        {{ $errors->first('status') }}
                                                    </span>
                                                @enderror
                                            </div>
                                            
                                            <div class="mt-3 mb-0">
                                                <div class="d-grid"><button class="btn btn-primary btn-block" type="submit">Create Slide</button></div>
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