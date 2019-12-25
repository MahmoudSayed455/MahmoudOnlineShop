@extends('Front.master')
@section('title', 'Shop Page')
@section('content')
    <main role="main">
        <section class="jumbotron text-center">
            <div class="container">
                <h1 class="jumbotron-heading">Mahmoud Online Shop</h1>
                <p class="lead text-muted"></p>
                <a href="#" class="btn btn-primary">maahhmmoud.sayed@gmail.com</a>
                <a href="#" class="btn btn-secondary">hoodasayed96@gmail.com</a>
            </div>
        </section>
        <div class="album py-5 bg-light">
            <div class="container">

                <div class="row">
                    @forelse($products as $product)
                        <div class="col-md-4">
                            <div class="card mb-4 shadow-sm">
                                <img class="card-img-top" src="{{url('images',$product->image)}}" style=" height: 190px;" alt="Card image cap">
                                <div class="card-body">
                                    <p class="card-text"> {{$product->product_name}}</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <a href="{{route('productDetails', $product->id)}}" class="btn btn-sm btn-outline-secondary">View Product <i class="fa fa-eye-slash"></i></a>
                                            <a href="{{route('CartAdd', $product->id)}}" class="btn btn-sm btn-outline-secondary">Add To Cart <i class="fa fa-shopping-cart"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <h3 class="text-danger">There Is No Products</h3>
                    @endforelse
                </div>
            </div>
        </div>
    </main>
@endsection