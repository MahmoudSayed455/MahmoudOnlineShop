@extends('Front.master')
@section('title', 'Product Details Page')
@section('content')
    <div class="container mt-5">
        <div class="row">
                <div class="col-md-6 col-Xs-12">
                    @if(session('success_to_cart'))
                           <div class="alert alert-success">{{session('success_to_cart')}}</div><br>
                    @endif       
                    @if (session('error'))
                        <div class="alert alert-info">{{session('error')}}</div>
                    @endif
                    @if (session('success'))
                        <div class="alert alert-success">{{session('success')}}</div><br>
                    @endif
                    <div class="thumbnail">
                        <img src="{{url('images', $product->image)}}" class="card-img">
                    </div>
                </div>
                <div class="col-md-5 col-md-offset-1">
                    <h2>{{ucwords($product->product_name)}}</h2>
                    <h5>{{$product->product_info}}</h5>
                    <h2 class="text-danger">$ {{$product->sp1_price}}</h2>
                    <p><b>Available: {{$product->stock}} In Stock</b></p>
                    <button class="btn btn-primary btn-sm">
                        <a href="{{route('CartAdd', $product->id)}}" class="btn btn-primary">Add To Cart <i class="fa fa-shopping-cart"></i></a>
                    </button>
                    <button class="btn btn-info  btn-sm">
                    <a href="{{route('addToWishlist', $product->id)}}" class="btn btn-info">Add To WishList <i class="fa fa-star-half-empty"></i> </a>
                    </button>
                </div>
        </div>
    </div>
@endsection