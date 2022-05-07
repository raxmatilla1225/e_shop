@extends('admin.layout.master')
@section('title','Roles')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-3 mt-2 mr-5">
                <div class="fa-pull-right">
                    <a href="{{route('roles.create')}}" class="btn btn-success">{{__('warehouse.create')}}</a>
                </div>
            </div>
        </div>
        @if ($message = Session::get('success'))
            <p class="alert alert-success">{{$message}}</p>
        @endif
        <table class="table">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">{{__('warehouse.name')}}</th>
                <th scope="col">{{__('warehouse.action')}}</th>
            </tr>
            </thead>
            <tbody>
            @foreach($roles as $role)
                <tr>
                    <th>{{$role->id}}</th>
                    <td>{{$role->name}}</td>
                    <td>
                        <div class="row">
                            <a class="btn btn-primary ml-1" href="{{route('roles.edit',$role->id)}}"><i class="fas fa-pen"></i></a>
                            <form action="{{route('roles.destroy',$role->id)}}" method="post">
                                @method('delete')
                                @csrf
                                <button class="btn btn-danger ml-1"><i class="fas fa-trash-alt"></i></button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
