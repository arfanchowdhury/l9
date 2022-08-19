@extends('layouts.general')

@section('content')




<header class="py-5">
<div class="container py-3">
<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel" data-interval="1000">
    <div class="carousel-indicators">
        @foreach($slides as $slide_image)
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active':'' }}" ></button>
        @endforeach
    </div>
  <div class="carousel-inner"  role="listbox">
        @foreach($slides as $slide)
        <div class="carousel-item  {{ $loop->first ? ' active':'' }}" >
            <img src="{{ url('storage/images/slide/images/'.$slide->image) }}" class="d-block w-100" alt="{{$slide->title}}" style="width: 100%;
   height: 550px;">
            <div class="carousel-caption d-none d-md-block">
                <h5>{{ $slide->title }}</h5>
                <p>{{ $slide->description }}</p>
            </div>
        </div>
    @endforeach
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
</div>
            <div class="container px-lg-5">
                <div class="p-4 p-lg-5 bg-light rounded-3 text-center">
                    <div class="m-4 m-lg-5">
                        <h1 class="display-5 fw-bold">A warm welcome!</h1>
                        <p class="fs-4">Our popular categories</p>
                    </div>
                </div>
            </div>
        </header>
        <!-- Page Content-->
        <section class="pt-4">
            <div class="container px-lg-5">
                <!-- Page Features-->
                <div class="row gx-lg-5">
                @foreach($categories as $category)
                    <div class="col-lg-6 col-xxl-4 mb-5">
                        <div class="card bg-light border-0 h-100">
                            <div class="card-body text-center p-4 p-lg-5 pt-0 pt-lg-0">
                                <div class="feature bg-primary bg-gradient text-white rounded-3 mb-4 mt-n4"><i class="bi bi-collection"></i></div>
                                <h2 class="fs-4 fw-bold">{{ $category->title }}</h2>
                            </div>
                        </div>
                    </div>
                @endforeach
                    
                    
                </div>
            </div>
        </section>
@stop