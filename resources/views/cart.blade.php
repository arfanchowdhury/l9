@extends('layouts.general')

@section('content')

<div class="container py-3">
        <div class="card mb-4">
            <div class="card-body">
                <h3><i class="bi-cart-fill me-1"></i> Shopping Cart</h3>
            </div>
            @if (session()->has('message'))
                <div class="container">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session()->get('message') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            @endif
        </div>
        
                
           
    <div class="card">
           
        @if(!$carts->isEmpty())
        <div class="card-body">
                <table class="table">
                <thead>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">Name</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Price</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($carts as $cart)
                    
                    <tr class="align-middle">
                        <td>
                            <img src="{{ url('storage/images/product/thumbnail_table/'.$cart->associate(\App\Models\Product::class)->model->image) }}" class="rounded-1" alt="{{ $cart->name }}">
                        </td>

                        <td>
                            <span>{{ $cart->name }}</span>
                        </td>

                        <td>
                            <span>
                                <form action="{{ route('cart.update') }}" method="post">
                                    @csrf
                                    <input type="hidden" value="{{ $cart->rowId }}" name="rowId">
                                    <input type="hidden" value="{{ $cart->id }}" name="id">
                                    <input style="max-width: 3rem" type="number" name="quantity" value="{{ $cart->qty }}" min="0" step="1"  onchange="this.form.submit()">
                                </form>
                            </span>
                        </td>

                        <td>
                            <span> {{ $cart->qty }} X {{ $cart->price }} </span>
                        </td>

                        <td>
                            <form action="{{ route('cart.remove') }}" method="post">
                                @csrf
                                <input type="hidden" value="{{ $cart->rowId}}" name="rowId">
                                <button class="badge  bg-dark" type="submit"> x </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
                    <tfoot>
                        <tr>
                            <td></td>
                            <td></td></td>
                            <td><strong> Total  </strong></td>
                            <td><strong> {{ Cart::subtotal() }} </strong></td>
                            <td> 
                                <form action="{{ route('cart.clear') }}" method="post">
                                    @csrf
                                    <button class="btn btn-outline-dark" type="submit"> Clear Cart </button>
                                </form>
                            </td>
                        </tr>
                    </tfoot>
                </table>
        </div>
    </div>
    @else
        <div class="card-body">
            <h3 class="text-center">You have no items in your shopping cart</h3>
        </div>
    @endif
</div>
@stop