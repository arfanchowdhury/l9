@extends('layouts.dashboard')

@section('content')

    <div class="container-fluid px-4">
        <h1 class="mt-2">Product</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                <li class="breadcrumb-item active">Product</li>
                <li class="breadcrumb-item active">Create</li>
            </ol>
    </div>

    <div class="row justify-content-center">
                            <div class="col-lg-6">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Create Product</h3></div>
                                    <div  class="card-body">
                                        <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
                                            @csrf
                                           
                                            <div class="form-floating mb-2">
                                                <input class="form-control overflow-hidden form-control-user {{ $errors->has('title') ? 'is-invalid':'' }}" id="inputTitle" type="text" name="title" value="{{ old('title') }}" placeholder="Enter title" />
                                                <label for="inputTitle">Title </label>
                                                @error('title')
                                                    <span class="text-danger mt-2 mb-0" role="alert"> 
                                                        {{ $errors->first('title') }}
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="form-floating mb-2">
                                                <select class="form-select" id="selectCategory" name="category_id" >
                                                    <option value="" >Select Category</option>
                                                        @foreach($categories as $category)
                                                            <option value="{{ $category->id }}">{{ $category->title }}</option>
                                                        @endforeach
                                                </select>
                                                <label for="selectCategory">Select Category</label>
                                                @error('category_id')
                                                    <span class="text-danger mt-2 mb-0" role="alert"> 
                                                        {{ $errors->first('category_id') }}
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="form-floating mb-2">
                                                <textarea class="form-control {{ $errors->has('description') ? 'is-invalid':'' }}" name="description" placeholder="Enter Description" id="inputDescription">{{ old('description') }}</textarea>
                                                <label for="inputDescription">Description</label>
                                                @error('description')
                                                    <span class="text-danger mt-2 mb-0" role="alert"> 
                                                        {{ $errors->first('description') }}
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="form-floating  mb-2">
                                                <input type="number" id="inputPrice" name="price" value="{{ old('price') }}" class="form-control {{ $errors->has('price') ? 'is-invalid':'' }}" step="0.1" min="1" pattern="^[-/d]/d*$"  placeholder="Enter Price">
                                                <label for="inputPrice">Price</label>
                                                @error('price')
                                                    <span class="text-danger mt-2 mb-0" role="alert"> 
                                                        {{ $errors->first('price') }}
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="form-floating  mb-2">
                                                <input type="number" id="inputDiscount" name="discount" value="{{ old('discount') }}" class="form-control {{ $errors->has('discount') ? 'is-invalid':'' }}" step="0.1" min="1" pattern="^[-/d]/d*$"  placeholder="Enter Discount">
                                                <label for="inputDiscount">Discount</label>
                                                @error('discount')
                                                    <span class="text-danger mt-2 mb-0" role="alert"> 
                                                        {{ $errors->first('discount') }}
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
                                                <input class="form-check-input" id="inputStatus" name="status" type="checkbox" value="0" />
                                                <label class="form-check-label" for="inputStatus">Status</label>
                                                @error('status')
                                                    <span class="text-danger mt-2 mb-0" role="alert"> 
                                                        {{ $errors->first('status') }}
                                                    </span>
                                                @enderror
                                            </div>
                                           

                                            <div class="mt-3 mb-0">
                                                <div class="d-grid"><button class="btn btn-primary btn-block" type="submit">Create Product</button></div>
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