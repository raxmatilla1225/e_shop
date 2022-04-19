@extends('admin.layout.master')
@section('content')
    <section style="background-color: #eee;">
        <div class="container py-5">
            <div class="row">
                <div class="col">
                    <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
                        <ol class="breadcrumb mb-0 row">
                            <li class="breadcrumb-item float-right">
                                <div class="d-flex justify-content-center mb-2 float-right">
                                    <a href="{{route('admin.dashboard.index')}}" class="btn btn-primary"> GO Back</a>
                                </div>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-8 m-auto">
                    <div class="card mb-12">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-4 m-auto">
                                        <div class="card-body text-center">
                                            <img src="{{asset('storage/'.$user->image)}}" alt="avatar" class="rounded-circle img-fluid" style="width: 150px; height: 150px">
                                            <h5 class="my-2">{{$user->name}}</h5>
                                        </div>
                                </div>
                            </div>
                            <div class="row text-center">
                                <div class="col-sm-6">
                                    <p class="mb-0">Full Name</p>
                                </div>
                                <div class="col-sm-6">
                                    <p class="text-muted mb-0">{{$user->name}}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row text-center">
                                <div class="col-sm-6">
                                    <p class="mb-0">Email</p>
                                </div>
                                <div class="col-sm-6">
                                    <p class="text-muted mb-0">{{$user->email}}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row text-center">
                                <div class="col-sm-6">
                                    <p class="mb-0">Phone</p>
                                </div>
                                <div class="col-sm-6">
                                    <p class="text-muted mb-0">{{$user->phone}}</p>
                                </div>

                            </div>
                            <div class="row">
                                <div class="d-flex justify-content-center m-auto my-5">
                                    <a class="btn btn-primary" href="{{route('users.edit', ['user' => $user])}}"> Edit Data </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
