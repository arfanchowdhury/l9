@extends('layouts.general')

@section('content')

@include('partials.header')
<div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    @foreach($products as $product)
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="{{ url('storage/images/product/thumbnail/'.$product->image) }}" alt="{{ $product->title }}" />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">{{ $product->title }}</h5>
                                    <!-- Product price-->
                                    @if($product->discount)
                                        <span class="text-muted text-decoration-line-through">${{ $product->price }}</span>
                                        {{ ($product->price * ($product->discount / 100)) }}
                                    @else
                                        {{$product->price}}
                                    @endif

                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center">
                                    <form action="{{ route('cart.store') }}" method="post">
                                        @csrf
                                        <a class="btn btn-outline-dark mt-auto" href="{{ route('shop.item', $product->id)}}">View</a>
                                        @if($cart->where('id', $product->id)->count())
                                            <span class="btn btn-outline-dark mt-auto"> In Cart</span>
                                        @else
                                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                                            <input type="hidden" name="quantity" value="1">
                                            <button class="btn btn-outline-dark mt-auto" type="submit">Add to cart</button>
                                        @endif
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
@stop