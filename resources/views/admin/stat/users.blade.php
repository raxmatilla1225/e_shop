@extends('admin.layout.master')
@section('title','Users Statuses')
@section('content')
    <div class="container">
        <div class="row">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">User Name</th>
                    <th scope="col">Status</th>
                </tr>
                </thead>
                <tbody>
                @foreach($stats as $stat)
                    <tr>
                        <th scope="row">{{$loop->index +1}}</th>
                        <th>{{$stat->user->name}}</th>
                        <th>{{$stat->name}}</th>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
