@extends('admin.layout.master')
@section('content')
    <div class="container">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">{{__('market.name')}}</th>
                <th scope="col">{{__('market.email')}}</th>
                <th scope="col">{{__('market.phone')}}</th>
                <th scope="col">{{__('market.address')}}</th>
                <th scope="col">{{__('market.working_hours')}}</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <th scope="row">{{$market->id}}</th>
                <th scope="row">{{$market->name}}</th>
                <th scope="row">{{$market->email}}</th>
                <th scope="row">{{$market->phone}}</th>
                <th scope="row">{{$market->address}}</th>
                <th scope="row">{{$market->working_hours}}</th>
                <td>
                <td>
                    <a href="{{ route('market.index')}}" class="btn btn-primary">{{__('market.index')}}</a>
                </td>
            </tr>

            </tbody>
        </table>
    </div>
@endsection
