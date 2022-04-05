@extends('admin.layout.master')
@section('title', 'User-show')
@section('content')
    <table class="table">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">{{__('user.name')}}</th>
            <th scope="col">{{ __('user.email') }}</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <th scope="row">{{ $user->id }}</th>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>
                <a href="{{ route('users.index')}}" class="btn btn-primary">{{__('user.go-back')}}</a>
            </td>
        </tr>

        </tbody>
    </table>
    @endsection()
