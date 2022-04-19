@extends('admin.layout.master')
@section('title','Statuses')
@section('content')

    <div class="container">
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <div class="col m-5">
                <div class="card">
                    <img src="image/users.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text">This is Users Status. Here you can manage statuses of Users</p>
                        <a class=" btn btn-primary rounded-pill" href="{{route('status.index')}}">👤 Manage</a>
                    </div>
                </div>
            </div>
            <div class="col m-5">
                <div class="card">
                    <img src="image/users.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text">This is Clients Status. Here you can manage statuses of Clients</p>
                        <a class=" btn btn-primary rounded-pill" href="{{route('status.index')}}">👤 Manage</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
