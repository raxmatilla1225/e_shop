@extends('admin.layout.master')
@section('title', 'User-show')
@section('content')
    <table class="table">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">{{__('user.name')}}</th>
            <th scope="col">{{ __('user.email') }}</th>
            <th scope="col">{{__('user.phone')}}</th>
            <th scope="col">{{ __('user.image') }}</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <th scope="row">{{ $user->id }}</th>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->phone}}</td>
            <td> <div class="image">
                    <img src="{{asset('storage/'.$user->image ) }}" class="img-circle elevation-2" width="60px" height="60px"
                         alt="User Image">
                </div></td>
            <td>
            <td>
                <a href="{{ route('users.index')}}" class="btn btn-primary">{{__('user.go-back')}}</a>
            </td>
        </tr>

        </tbody>
    </table>
    @endsection()
