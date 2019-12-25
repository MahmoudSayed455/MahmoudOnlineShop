@extends('Front.master')
@section('title', 'Home Page')
@section('content')
<main role="main">
      <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="{{asset('dist/img/c2.jpg')}}" class="d-block w-100" alt="..." style="height: 300px">
          </div>
          <div class="carousel-item">
            <img src="{{asset('dist/img/l1.jpg')}}" class="d-block w-100" alt="..." style="height: 300px">
          </div>
          <div class="carousel-item">
            <img src="{{asset('dist/img/p2.jpg')}}" class="d-block w-100" alt="..." style="height: 300px">
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>

      <div class="album py-5 bg-light">
        <div class="container">

          <div class="row">
            @forelse($products as $product)
              <div class="col-md-4">
              <div class="card mb-4 shadow-sm">
                <img class="card-img-top" style=" height: 190px;" src="{{url('images',$product->image)}}" alt="Card image cap">
                <div class="card-body">
                  <p class="card-text"> {{$product->product_name}}</p>
                  <p class="card-text float-right">$ {{$product->product_price}}</p>
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