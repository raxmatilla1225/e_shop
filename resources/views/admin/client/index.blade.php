@extends('admin.layout.master')
@section('title','Clients')
@section('content')
    <div class="container">
        <div class="row float-right">
            <div class="col-md-12 mb-3 mt-2 mr-5">
                <a href="{{route('client.create')}}" class="btn btn-success">{{__('user.create')}}</a>
            </div>
        </div>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">{{__('user.name')}}</th>
                <th scope="col">{{__('user.username')}}</th>
                <th scope="col">{{__('user.phonenumber')}}</th>
                <th scope="col">{{__('user.action')}}</th>
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
                            <a class="btn btn-warning ml-1" href="{{route('client.show', ['client' => $client])}}">{{__('user.show')}}</a>
                            <a class="btn btn-primary ml-1" href="{{route('client.edit', ['client' => $client])}}">{{__('user.update')}}</a>
                            <form action="{{route('client.destroy', ['client' => $client->id])}}" method="post">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger ml-1">{{__('user.delete')}}</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{$clients->links('pagination.bootstrap-5')}}
    </div>

@endsection
