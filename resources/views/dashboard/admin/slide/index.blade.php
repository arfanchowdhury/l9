@extends('layouts.dashboard')

@section('content')

    <div class="container-fluid px-4">
        <h1 class="mt-2">Slides</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                <li class="breadcrumb-item active">Slides</li>
            </ol>

            @if(session()->has('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session()->get('message') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

                        <div class="card mb-4">
                            <div class="card-header">
                                <a href="{{ route('slides.create') }}" class="btn btn-outline-dark">
                                    <i class="fa-solid fa-plus"></i> Add New Slide
                                </a>
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>SL.No</th>
                                            <th>Image</th>
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th>Serial</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                  
                                    <tbody>
                                        @foreach($slides as $slide)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td><img src="{{ url('storage/images/slide/thumbnail/'.$slide->image)}}" class="rounded-1" alt="{{ $slide->title }}"></td>
                                            <td>{{ $slide->title }}</td>
                                            <td>{{ $slide->description }}</td>
                                            <td>{{ $slide->serial }}</td>
                                            <td>{{ $slide->status ? 'Active':'Inactive'}}</td>
                                            <td>
                                                <form action="{{ route('slides.destroy', $slide->id) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <a href="{{ route('slides.show', $slide->id) }}" class="btn btn-outline-dark btn-sm"><i class="fas fa-file-invoice"></i> Show</a>
                                                    <a href="{{ route('slides.edit', $slide->id) }}" class="btn btn-outline-dark btn-sm"><i class="fas fa-edit"></i> Edit</a>
                                                    <button type="submit" class="btn btn-outline-danger btn-sm" >Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        </div>

                       

@stop