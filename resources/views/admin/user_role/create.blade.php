@extends('admin.layout.master')
@section('title','Users-create')
@section('content')
  <div class="container">
      <form action="{{route('user_role.store')}}" method="post" enctype="multipart/form-data">
          @method('POST')
          @csrf
          <label  class="form-label">Choose user</label>
          <select class="form-select" aria-label="Default select example" name="user">
              <option value="0">None</option>
              @foreach($users as $user)
                  <option value="{{$user->id}}">{{$user->name}}</option>
              @endforeach
          </select>
          @error('user')
          <div class="alert alert-danger">{{ $message }}</div>
          @enderror
          <label  class="form-label">Choose role</label>
          <select class="form-select" aria-label="Default select example" class="role">
              <option value="0">None</option>
              @foreach($roles as $role)
                  <option value="{{$role->id}}">{{$role->name}}</option>
              @endforeach
          </select>
          @error('role')
          <div class="alert alert-danger">{{ $message }}</div>
          @enderror

          <button type="submit" class="btn btn-primary">{{__('user.submit')}}</button>
      </form>
  </div>
@endsection
