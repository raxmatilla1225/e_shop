@extends('admin.layout.master')
@section('title','User Role')
@section('content')
    <div class="container">
  <div class="container">
      <form action="{{route('user_role.store')}}" method="post" enctype="multipart/form-data">
          @method('POST')
          @csrf

          <div class="form-group">
              <label for="mySelect">{{__('actions.choose' , ['model' => __('user.user')])}}</label>
              <select id="mySelect" class="form-control" name="user">
                  <option value="">None</option>
                  @foreach($users as $user)
                      <option value="{{$user->id}}">{{$user->name}}</option>
                  @endforeach
              </select>
          </div>
          @error('user')
          <div class="alert alert-danger">{{ $message }}</div>
          @enderror
          <div class="form-group">
              <label for="mySelect">{{__('actions.choose' , ['model' => __('role.role')])}}</label>
              <select id="mySelect" class="form-control" name="role">
                  <option value="" >None</option>
                  @foreach($roles as $role)
                      <option value="{{$role->id}}">{{$role->name}}</option>
                  @endforeach
              </select>
          </div>
          @error('role')
          <div class="alert alert-danger">{{ $message }}</div>
          @enderror

          <button type="submit" class="btn btn-primary">{{__('user.submit')}}</button>
      </form>
  </div>
    </div>
@endsection
