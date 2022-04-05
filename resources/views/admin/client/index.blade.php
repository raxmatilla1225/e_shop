@extends('admin.layout.master')
@section('title','Clients')
@section('client')

    <div class="container">
        <div class="row float-right">
            <div class="col-md-12 mb-3 mt-2 mr-5">
                <a href="{{route('client.create')}}" class="btn btn-success">CREATE+</a>
            </div>
        </div>
{{--        @if (session('success'))--}}
{{--            <div class="alert alert-success">--}}
{{--                {{ session('success') }}--}}
{{--            </div>--}}
{{--        @endif--}}
        <table class="table">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Username</th>
                <th scope="col">Phone number</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($clients as $client)
                <tr>
                    <th scope="row">{{$client->id}}</th>
                    <th scope="row">{{$client->name}}</th>
                    <th scope="row">{{$client->username}}</th>
                    <th scope="row">{{$client->phone_number}}</th>
                    <td>
                        <div class="row">
                            <a class="btn btn-warning ml-1" href="{{route('client.show', ['client' => $client])}}">SHOW</a>
                            <a class="btn btn-primary ml-1" href="{{route('client.edit', ['client' => $client])}}">UPDATE</a>
                            <form action="{{route('client.destroy', ['client' => $client->id])}}" method="post">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger ml-1">DELETE</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection
