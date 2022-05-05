@extends('admin.layout.master')
@section('title','Status Types')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-3 mt-2 mr-5">
                <div class="fa-pull-right">
                    <a href="{{route('types.create')}}" class="btn btn-success">{{__('warehouse.create')}}</a>
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
            @foreach($st_type as $type)
                <tr>
                    <th>{{$type->id}}</th>
                    <td>{{$type->name}}</td>
                    <td>
                        <div class="row">
                            <a class="btn btn-primary ml-1" href="{{route('types.edit',$type->id)}}">{{__('user.update')}}</a>
                            <form action="{{route('types.destroy', $type->id)}}" method="post">
                                @method('delete')
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
