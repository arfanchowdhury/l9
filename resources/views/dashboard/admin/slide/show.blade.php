@extends('layouts.dashboard')

@section('content')

    <div class="container-fluid px-4">
        <h1 class="mt-2">Slide</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                <li class="breadcrumb-item active">Slide</li>
                <li class="breadcrumb-item active">Details</li>
            </ol>
    </div>

    <div class="row justify-content-center">
                            <div class="col-lg-6">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Slide info</h3></div>
                                    <div class="card-body">
                                    <div class="mb-3 row">
                                            <label for="staticTitle" class="col-sm-2 col-form-label fw-bolder">Image :</label>
                                            <div class="col-sm-10 mt-2">
                                            <img src="{{ url('storage/images/slide/images/'.$slide->image)}}" class="img-fluid" alt="{{$slide->title}}">
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label for="staticTitle" class="col-sm-2 col-form-label fw-bolder">Title :</label>
                                            <div class="col-sm-10 mt-2">
                                            {{ $slide->title}}
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label for="staticTitle" class="col-sm-2 col-form-label fw-bolder">Description :</label>
                                            <div class="col-sm-10 mt-2">
                                            {{ $slide->description}}
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label for="staticTitle" class="col-sm-2 col-form-label fw-bolder">Serial :</label>
                                            <div class="col-sm-10 mt-2">
                                            {{ $slide->serial}}
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label for="staticTitle" class="col-sm-2 col-form-label fw-bolder">Status : </label>
                                            <div class="col-sm-10 mt-2">
                                            {{ $slide->status ? 'Active':'Inactive'}}
                                            </div>
                                        </div>

                                    </div>
                                    <div class="card-footer text-center py-3">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

@stop