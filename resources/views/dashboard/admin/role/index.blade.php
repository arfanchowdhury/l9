@extends('layouts.dashboard')

@section('content')

    <div class="container-fluid px-4">
        <h1 class="mt-2">Roles</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                <li class="breadcrumb-item active">Roles</li>
            </ol>
            @if(session()->has('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session()->get('message') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

                        <div class="card mb-4">
                            <div class="card-header">
                                <a href="{{ route('roles.create') }}" class="btn btn-outline-dark">
                                    <i class="fa-solid fa-plus"></i> Add New Role
                                </a>
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>SL.No</th>
                                            <th>Title</th>
                                            <th>Slug</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                  
                                    <tbody>
                                        @foreach($roles as $role)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $role->title }}</td>
                                            <td>{{ $role->slug }}</td>
                                            <td>{{ $role->status ? 'Active':'Inactive'}}</td>
                                            <td>
                                                <form action="{{ route('roles.destroy', $role->id) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <a href="{{ route('roles.show', $role->id) }}" class="btn btn-outline-dark btn-sm"><i class="fas fa-file-invoice"></i> Show</a>
                                                    <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-outline-dark btn-sm"><i class="fas fa-edit"></i> Edit</a>
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

                        <!-- Button trigger modal -->



@stop