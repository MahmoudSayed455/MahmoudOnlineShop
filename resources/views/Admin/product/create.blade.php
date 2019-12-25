@extends('Admin.master')
@section('title', 'Add New Product')
@section('content')
    <div class="container-fluid">
        <div class="row">
    <main class="col-sm-9 ml-sm-auto col-md-10 pt-3 " style="text-decoration: underline; margin-top: 50px" >
        <h3>Add New Product</h3>
        <div class="col-md-6">
            <div class="panel-body">
                <form action="{{route('products.store')}}" method="post" role="form" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group {{$errors->has('product_name')?' has_error':''}}" >
                        <label for="product_name">Name</label>
                        <input type="text" class="form-control" name="product_name" id="product_name" placeholder="product Name">
                        <span class="text-danger">{{$errors->first('product_name')}}</span>
                    </div>
                    <div class="form-group {{$errors->has('product_code')?' has_error':''}}" >
                        <label for="product_code">Code</label>
                        <input type="text" class="form-control" name="product_code" id="product_code" placeholder="product Code">
                        <span class="text-danger">{{$errors->first('product_code')}}</span>
                    </div>
                    <div class="form-group {{$errors->has('product_price')?' has_error':''}}" >
                        <label for="product_price">Price</label>
                        <input type="text" class="form-control" name="product_price" id="product_price" placeholder="product Price">
                        <span class="text-danger">{{$errors->first('product_price')}}</span>
                    </div>
                    <div class="form-group {{$errors->has('stock')?' has_error':''}}" >
                        <label for="stock">Stock</label>
                        <input type="text" class="form-control" name="stock" id="stock" placeholder="Stock">
                        <span class="text-danger">{{$errors->first('stock')}}</span>
                    </div>
                    <div class="form-group {{$errors->has('product_info')?' has_error':''}}" >
                        <label for="product_info">Description</label>
                        <textarea id="product_info" name="product_info" class="form-control" rows="5"></textarea>
                        <span class="text-danger">{{$errors->first('product_info')}}</span>
                    </div>
                    <div class="form-group {{$errors->has('category_id')?' has_error':''}}" >
                        <label for="category_id">Category</label>
                        <select name="category_id" id="category_id" class="form-control">
                            <option value="">-- Select Category --</option>
                            @foreach($categories as $id=>$category)
                                <option value="{{$id}}">{{$category}}</option>
                            @endforeach
                        </select>
                        <span class="text-danger">{{$errors->first('category_id')}}</span>
                    </div>
                    <div class="form-group {{$errors->has('product_image')?' has_error':''}}" >
                        <label for="product_image">Image</label>
                        <input type="file" class="form-control" name="product_image" id="product_image">
                        <span class="text-danger">{{$errors->first('product_image')}}</span>
                    </div>
                    <div class="form-group {{$errors->has('sp1_price')?' has_error':''}}" >
                        <label for="sp1_price">Sale Price</label>
                        <input type="text" class="form-control" name="sp1_price" id="sp1_price" placeholder="Sale Price">
                        <span class="text-danger">{{$errors->first('sp1_price')}}</span>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>

                </form>
            </div>
        </div>
    </main>
        </div>
    </div>
@endsection
