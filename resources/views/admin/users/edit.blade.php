@extends('admin.layout.master')
@section('title','Users-edit')
@section('content')
    <div class="container">
        <form action="{{route('users.update', ['user' => $user])}}" method="post" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">{{__('user.name')}}</label>
                <input type="text" class="form-control" id="name" name="name" value="{{$user->name}}">
            </div>
            @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">{{__('user.email')}}</label>
                <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" value="{{$user->email}}">
            </div>
            @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="mb-3">
                <label for="phone" class="form-label">{{__('user.phone')}}</label>
                <input type="text" class="form-control"  name="phone" value="{{$user->phone}}">
            </div>
            @error('phone')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="col-md-12">
                <div class="form-group">
                    <input type="file" name="image" placeholder="Choose image" id="image" value="{{asset('storage/'.$user->image)}}">
                    @error('image')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <button type="submit" class="btn btn-primary">{{__('user.submit')}}</button>
        </form>
    </div>
@endsection
