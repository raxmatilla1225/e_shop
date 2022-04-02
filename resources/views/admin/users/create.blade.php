@extends('admin.layout.master')
@section('title','Users-create')
@section('content')
  <div class="container">
      <form action="{{route('users.store')}}" method="post">
          @method('POST')
          @csrf
          <div class="mb-3">
              <label for="name" class="form-label">Name</label>
              <input type="text" class="form-control" id="name" name="name" >
          </div>
          @error('name')
          <div class="alert alert-danger">{{ $message }}</div>
          @enderror
          <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Email address</label>
              <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp">
          </div>
          @error('email')
          <div class="alert alert-danger">{{ $message }}</div>
          @enderror
          <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label" >Password</label>
              <input type="password" class="form-control" id="exampleInputPassword1" name="password">
          </div>
          @error('password')
          <div class="alert alert-danger">{{ $message }}</div>
          @enderror
          <button type="submit" class="btn btn-primary">Submit</button>
      </form>
  </div>
@endsection
