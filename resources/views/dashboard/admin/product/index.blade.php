@extends('layouts.dashboard')

@section('content')

    <div class="container-fluid px-4">
        <h1 class="mt-2">Product</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                <li class="breadcrumb-item active">Products</li>
            </ol>

            @if(session()->has('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session()->get('message') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
                        <div class="card mb-4">
                            <div class="card-header">
                                <a href="{{ route('products.create') }}" class="btn btn-outline-dark">
                                    <i class="fa-solid fa-plus"></i> Add New Product
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
                                            <th>Price</th>
                                            <th>Discount</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                  
                                    <tbody>
                                        @foreach($products as $product)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>
                                                <img src="{{ url('storage/images/product/thumbnail_table/'.$product->image) }}" class="rounded-1" alt="{{ $product->title }}">
                                            </td>
                                            <td>{{ $product->title }}</td>
                                            <td>{{ $product->description }}</td>
                                            <td>{{ $product->price }}</td>
                                            <td>{{ $product->discount == 0 ? 'No Discont': $product->discount }}</td>
                                            <td>{{ $product->category()->first()->title }}</td>
                                            <td>{{ $product->status ? 'Active':'Inactive'}}</td>
                                            <td>
                                                <form action="{{ route('products.destroy', $product->id) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <a href="{{ route('products.show', $product->id) }}" class="btn btn-outline-dark btn-sm"><i class="fas fa-file-invoice"></i> Show</a>
                                                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-outline-dark btn-sm"><i class="fas fa-edit"></i> Edit</a>
                                                    <button type="submit" class="btn btn-outline-danger btn-sm"><i class="fas fa-trash"></i> Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                               
                                    {{ $products->withQueryString()->links('pagination::bootstrap-5') }}
                              
                            </div>
                        </div>
                        </div>

                        
@stop