@extends('admin.layout.master')
@section('client')
    <div class="container">
        <form action="{{route('client.store')}}" method="post">
            @method('POST')
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">{{__('user.name')}}</label>
                <input type="text" class="form-control" id="name" name="name" >
            </div>
            @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">{{__('user.username')}}</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="username" aria-describedby="emailHelp">
            </div>
            @error('username')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label" >{{__('user.phonenumber')}}</label>
                <input type="text" class="form-control" id="exampleInputPassword1" name="phone_number">
            </div>
            @error('number')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <button type="submit" class="btn btn-primary">{{__('user.save')}}</button>
        </form>
    </div>
@endsection
