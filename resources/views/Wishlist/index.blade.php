@extends('Front.master')
@section('title','Wishlist Page')
@section('content')
    <div class="container mt-5">
        <div class="row">
            
            @if ($products->isEmpty())
                <h4 class="text-danger">Sorry, Your Wishlist Is Empty!</h4>
            @endif
            @if (session('success_to_cart'))
            <div class="alert alert-success">{{session('success_to_cart')}}</div>
            @endif
            @if (session('removed_success'))
            <div class="alert alert-success">{{session('removed_success')}}</div>
            @endif
            @foreach($products as $product)
            <div class="col-md-4 col-sm-4">
                <div class="text-center mt-5">
                    <a href="{{route('productDetails', $product->id)}}">
                        <img src="{{url('images', $product->image)}}" style=" height: 190px;" class="card-img">
                    </a>
                    <h2 class="text-danger">$ {{$product->product_price}}</h2>
                    <p>
                        <a href="{{route('productDetails', $product->id)}}">
                          {{($product->product_name)}}
                        </a>
                    </p>

                        <a href="{{route('CartAdd', $product->id)}}" class="btn btn-primary">Add To Cart <i class="fa fa-shopping-cart"></i></a>
                        <a href="{{route('removeFromWishlist', $product->id)}}" class="btn btn-danger">Remove From WishList <i class="fa fa-remove"></i></a>
                </div>
            </div>
                @endforeach
        </div>
    </div>
@endsection