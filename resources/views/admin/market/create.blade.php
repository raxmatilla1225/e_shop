@extends('admin.layout.master')
@section('content')
    <div class="container">
        <form action="{{route('market.store')}}" method="post">
            @method('POST')
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="exampleInputName" name="name" >
            </div>
            @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp">
            </div>
            @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="mb-3">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" name="password" value="{{$market->password}}" class="form-control" id="exampleInputPassword" placeholder="password>
            </div>
            @error('password')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="text" class="form-control" id="exampleInputPhone" name="phone">
            </div>
            @error('phone')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <input type="text" class="form-control" id="exampleInputAddress" name="address">
            </div>
            @error('address')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="mb-3">
                <label for="working_hours" class="form-label">Working Hours</label>
                <input type="text" class="form-control" id="exampleInputWorking_hours" name="working_hours">
            </div>
            @error('working_hours')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <button type="submit" class="btn btn-primary">{{__('market.save')}}</button>
        </form>
    </div>
@endsection
