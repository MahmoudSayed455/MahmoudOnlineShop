@extends('Front.master')
@section('title', 'Category Page')
@section('content')
    <div class="album py-5 bg-light">
        <div class="container">
            <?php $category =\Illuminate\Support\Facades\DB::table('categories')->select('name')->where('id', $idd)->get();
            ?>
            <h4>
                @foreach($category as $cat)
                    Category: {{$cat->name}}
                @endforeach
            </h4>
            <div class="row">
                @forelse($category_products as $product)
                    <div class="col-md-4">
                        <div class="card mb-4 shadow-sm">
                            <img class="card-img-top" src="{{url('images',$product->image)}}" style=" height: 190px;" alt="Card image cap">
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
@endsection