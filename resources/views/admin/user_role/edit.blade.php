@extends('admin.layout.master')
@section('title','User Role')
@section('content')
    <div class="container">
        <div class="container">
            <form action="{{route('user_role.update', ['user_role' => $user_role])}}" method="post" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="mySelect">{{__('actions.choose' , ['model' => __('user.user')])}}</label>
                    <select id="mySelect" class="form-control" name="user">
                        <option value="{{$user_role->user_id}}">{{$user_role->user->name}}</option>
                        @foreach($users as $user)
                            <option value="{{$user->id}}">{{$user->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="mySelect">{{__('actions.choose' , ['model' => __('role.role')])}}</label>
                    <select id="mySelect" class="form-control" name="role">
                        <option value="{{$user_role->role_id}}" >{{$user_role->role->name}}</option>
                        @foreach($roles as $role)
                            <option value="{{$role->id}}">{{$role->name}}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">{{__('user.submit')}}</button>
            </form>
        </div>
    </div>
@endsection
