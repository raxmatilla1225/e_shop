@extends('admin.layout.master')
@section('title','Users')
@section('content')
    <div class="container">
        <div class="row float-right">
            <div class="col-md-12 mb-3 mt-2 mr-5">
                <a href="{{route('users.create')}}" class="btn btn-success">CREATE+</a>
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
                <th scope="col">Name</th>
                <th scope="col">Email</th>
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
                            <a class="btn btn-warning" href="{{route('users.show', ['user'=> $user])}}">SHOW</a>
                            <a class="btn btn-primary" href="{{route('users.edit', ['user'=> $user])}}">UPDATE</a>
                            <form action="{{route('users.destroy', ['user'=> $user])}}" method="post">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger">DELETE</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
