@extends('admin.layout.master')
@section('title','Users-create')
@section('content')
  <div class="container">
      <form action="{{route('users.store')}}" method="post" enctype="multipart/form-data">
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
              <label for="exampleInputEmail1" class="form-label">{{__('user.email')}}</label>
              <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp">
          </div>
          @error('email')
          <div class="alert alert-danger">{{ $message }}</div>
          @enderror
          <div class="mb-3">
              <label for="phone" class="form-label">{{__('user.phone')}}</label>
              <input type="text" class="form-control"  name="phone">
          </div>
          @error('phone')
          <div class="alert alert-danger">{{ $message }}</div>
          @enderror
          <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label" >{{__('user.password')}}</label>
              <input type="password" class="form-control" id="exampleInputPassword1" name="password">
          </div>
          @error('password')
          <div class="alert alert-danger">{{ $message }}</div>
          @enderror
          <div class="col-md-12">
              <div class="form-group">
                  <input type="file" name="image" placeholder="Choose image" id="image">
                  @error('image')
                  <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                  @enderror
              </div>
          </div>
{{--          <x-a-l-input type="text" name="something" id="something" placeholder="Placeholder..." label="Label..."></x-a-l-input>--}}
          <button type="submit" class="btn btn-primary">{{__('user.submit')}}</button>
      </form>
  </div>
@endsection
