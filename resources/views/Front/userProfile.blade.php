@extends('Front.master')
@section('title','Profile Page')
@section('content')
    <div class="container mt-3">
        @if (session('success'))
                <div class="alert alert-success ">{{session('success')}}</div>
            @endif
        <form action="{{route('updateUserProfile')}}" method="post" class="bg-light text-muted">
            {{csrf_field()}}
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" class="form-control" name="name" value="{{$user->name}}" required>
            </div>
            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="text" id="email" class="form-control" name="email" value="{{$user->email}}" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" class="form-control" name="password" required>
            </div>
            <div class="form-group">
                <label for="confirm_password">Confirm Password</label>
                <input type="password" id="confirm_password" class="form-control" name="confirm_password" required>
            </div>
            <div class="form-group">
                    <input type="submit"  class="btn btn-primary" value="Update">
                    <button class="btn btn-danger" ><a href="{{url('/')}}" class="text-white">Cancel</a> </button>
            </div>
        </form>
    </div>
@endsection