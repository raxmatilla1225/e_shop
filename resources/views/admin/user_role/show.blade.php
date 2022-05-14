@extends('admin.layout.master')
@section('title', 'User-show')
@section('content')
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
        <tr>
            <th scope="row">{{$user_role->id}}</th>
            <td>{{$user->name}}</td>
            <td>{{$role->name}}</td>
            <td>
                <a href="{{ route('user_role.index')}}" class="btn btn-primary">{{__('user.go-back')}}</a>
            </td>
        </tr>

        </tbody>
    </table>
    @endsection()
