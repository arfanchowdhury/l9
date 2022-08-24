@extends('layouts.general')

@section('content')
 <!-- Product section-->
 <section class="py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="row gx-4 gx-lg-5 align-items-center">
                    <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="{{ url('storage/images/product/images/'. $product->image) }}" alt="{{ $product->title }}" /></div>
                    <div class="col-md-6">
                        <div class="small mb-1">{{ $product->category()->first()->title }}</div>
                        <h1 class="display-5 fw-bolder">{{ $product->title }}</h1>
                        <div class="fs-5 mb-5">
                                @if($product->discount)
                                    <span class="text-muted text-decoration-line-through">${{ $product->price }}</span>
                                    {{ ($product->price * ($product->discount / 100)) }}
                                @else
                                    {{$product->price}}
                                @endif
                        </div>
                        <p class="lead">{{ $product->description }}</p>
                        <div class="d-flex">
                            <form action="{{ route('cart.store') }}" method="post">
                                @csrf
                                @if($cart->where('id', $product->id)->count())
                                    <span class="btn btn-outline-dark flex-shrink-0"><i class="bi-cart-fill me-1"></i> In Cart</span>
                                @else
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <input type="hidden" name="quantity" value="1">
                                    <button class="btn btn-outline-dark flex-shrink-0" type="submit">
                                        <i class="bi-cart-fill me-1"></i> Add to cart
                                    </button>
                                @endif
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Related items section-->
        <section class="py-5 bg-light">
            <div class="container px-4 px-lg-5 mt-5">
                <h2 class="fw-bolder mb-4">Related products</h2>
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    
                    @foreach($related_products as $r_product)
                        @if($r_product->id != $product->id)
                            <div class="col mb-5">
                                <div class="card h-100">
                                    <!-- Product image-->
                                    <img class="card-img-top" src="{{ url('storage/images/product/thumbnail/'. $r_product->image) }}" alt="{{ $r_product->title }}" />
                                    <!-- Product details-->
                                    <div class="card-body p-4">
                                        <div class="text-center">
                                            <!-- Product name-->
                                            <h5 class="fw-bolder">{{ $r_product->title }}</h5>
                                            <!-- Product price-->
                                            @if($r_product->discount)
                                                <span class="text-muted text-decoration-line-through">${{ $r_product->price }}</span>
                                                {{ ($r_product->price * ($r_product->discount / 100)) }}
                                            @else
                                                {{$r_product->price}}
                                            @endif
                                        </div>
                                    </div>
                                    <!-- Product actions-->
                                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                        <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="{{ route('shop.item', $r_product->id)}}">View </a> <a class="btn btn-outline-dark mt-auto" href="#">Add to cart</a></div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </section>
@stop