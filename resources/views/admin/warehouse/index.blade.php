@extends('admin.layout.master')
@section('title','Warehouses')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-3 mt-2 mr-5">
                <div class="fa-pull-right">
                <a href="{{route('warehouse.create')}}" class="btn btn-success">{{__('warehouse.create')}}</a>
                </div>
            </div>
        </div>
        @if ($message = Session::get('succes'))
            <div class="alert alert-success">
                <p>{{$message}}</p>
            </div>
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
            @foreach($warehouses as $warehouse)
                <tr>
                    <th>{{$warehouse->id}}</th>
                    <td>{{$warehouse->name}}</td>
                    <td>
                        <div class="row">
                            <a class="btn btn-warning ml-1" href="{{route('warehouse.show', $warehouse->id)}}">{{__('warehouse.show')}}</a>
                            <a class="btn btn-primary ml-1" href="{{route('warehouse.edit',$warehouse->id)}}">{{__('warehouse.edit')}}</a>
                            <form action="{{route('warehouse.destroy', $warehouse->id)}}" method="post">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger ml-1">{{__('warehouse.delete')}}</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
