@extends('admin.layout.master')
@section('title','Users')
@section('content')
    <div class="container">
        <div class="row float-right">
            <div class="col-md-12 mb-3 mt-2 mr-5">
                <a href="{{route('user_role.create')}}" class="btn btn-success">{{__('actions.connect', ['model' => __('role_user.user_role')])}}</a>
            </div>
        </div>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <table class="table">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">{{__('user.user')}}</th>
                <th scope="col">{{ __('role.role') }}</th>
                <th scope="col">{{__('actions.actions')}}</th>
            </tr>
            </thead>
            <tbody>
            @foreach($user_roles as $user_role)
                <tr>
                    <th scope="row">{{$loop->index +1}}</th>
                    <td>{{$user_role->user->name}}</td>
                    <td>{{$user_role->role->name}}</td>

                    <td>
                        <div class="row">
                            <a class="btn btn-warning" href="{{route('user_role.show', ['user_role'=> $user_role])}}">{{__('user.show')}}</a>
                            <a class="btn btn-primary" href="{{route('user_role.edit', ['user_role'=> $user_role])}}">{{__('user.update')}}</a>
                            <form action="{{route('user_role.destroy', ['user_role'=> $user_role])}}" method="post">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger">{{__('user.delete')}}</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
