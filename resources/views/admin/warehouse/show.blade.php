@extends('admin.layout.master')
@section('title', 'Show Warehouse')
@section('content')
<div class="container">
    <table class="table">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">{{__('warehouse.name')}}</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <th scope="row">{{$warehouse->id}}</th>
            <td>{{$warehouse->name}}</td>
            <td>
                <a href="{{route('warehouse.index')}}" class="btn btn-primary">{{__('warehouse.back')}}</a>
            </td>
        </tr>
        </tbody>
    </table>
</div>

@endsection
