@extends('admin.layout.master')
@section('title','Status')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-3 mt-2 mr-5">
                <div class="fa-pull-right">
                    <a href="{{route('status.create')}}" class="btn btn-success">{{__('warehouse.create')}}</a>
                </div>
            </div>
        </div>
        @if($message= Session::get('success'))
        <div class="alert alert-success">
            <p>{{$message}}</p>
        </div>
        @endif
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">{{__('status.name')}}</th>
                    <th scope="col">{{__('status.type')}}</th>
                    <th scope="col">{{__('warehouse.action')}}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($stats as $stat)
                    <tr>
                        <th>{{$stat->id}}</th>
                        <td>{{$stat->name}}</td>
                        <td>{{$stat->type->name}}</td>
                        <td>
                            <div class="row">
                                <a class="btn btn-primary ml-1" href="{{route('status.edit', $stat->id)}}">{{__('user.update')}}</a>
                                <form action="{{route('status.destroy', $stat->id)}}" method="post">
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
