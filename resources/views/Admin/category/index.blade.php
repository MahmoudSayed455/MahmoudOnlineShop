@extends('Admin.master')
@section('title', 'Category Page')
@section('content')
    <main class="col-sm-9 ml-sm-auto col-md-10 pt-3" role="main" style="margin-top: 50px">
        <h3 style="text-decoration: underline;">List Categories</h3><br>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Category Id</th>
                    <th>Category Name</th>
                </tr>
                </thead>
                <tbody>
            @if(!empty($categories))
                @forelse($categories as $category)
                    <tr>
                        <td>
                            {{$category->id}}
                        </td>
                        <td>
                            {{$category->name}}
                        </td>
                    </tr>
                @empty
                <li class="text-danger">No Categories Found</li>
                @endforelse
             @endif
                </tbody>
            </table>
        </div><br>
        <form action="{{route('categories.store')}}" method="post" role="form">
            {{csrf_field()}}
            <div class="form-group">
                <label for="cat_name">Category Name</label>
                <input type="text" class="form-control" name="category_name" id="cat_name" placeholder="Category Name">
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </main>
@endsection