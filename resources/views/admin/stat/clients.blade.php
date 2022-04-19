@extends('admin.layout.master')
@section('title','Clients Statuses')
@section('content')
    <div class="container">
        <div class="row col-md-12 mb-3 mt-0 mr-2">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Client Name</th>
                    <th scope="col">Username</th>
                    <th scope="col">Status</th>
                </tr>
                </thead>
                <tbody>
                @foreach($stats as $stat)
                <tr>
                    <th scope="row">{{$loop->index +1}}</th>
                    <th>{{$stat->client->name}}</th>
                    <th>{{$stat->client->username}}</th>
                    <th>{{$stat->name}}</th>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
