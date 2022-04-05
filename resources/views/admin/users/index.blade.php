@extends('admin.layout.master')
@section('title','Users')
@section('content')
    <div class="container">
        <div class="row float-right">
            <div class="col-md-12 mb-3 mt-2 mr-5">
                <a href="{{route('users.create')}}" class="btn btn-success">{{__('user.create')}}</a>
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
                <th scope="col">{{__('user.name')}}</th>
                <th scope="col">{{ __('user.email') }}</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <th scope="row">{{$loop->index +1}}</th>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>
                        <div class="row">
                            <a class="btn btn-warning" href="{{route('users.show', ['user'=> $user])}}">{{__('user.show')}}</a>
                            <a class="btn btn-primary" href="{{route('users.edit', ['user'=> $user])}}">{{__('user.update')}}</a>
                            <form action="{{route('users.destroy', ['user'=> $user])}}" method="post">
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
