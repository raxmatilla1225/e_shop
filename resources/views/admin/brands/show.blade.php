@extends('admin.layout.master')
@section('content')
    <div class="container">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">{{__('brands.name')}}</th>
                <th scope="col">{{__('brands.email')}}</th>
                <th scope="col">{{__('brands.phone')}}</th>
                <th scope="col">{{__('brands.image')}}</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <th scope="row">{{$brands->id}}</th>
                <th scope="row">{{$brands->name}}</th>
                <th scope="row">{{$brands->email}}</th>
                <th scope="row">{{$brands->phone}}</th>
                <th scope="row">{{$brands->image}}</th>
                <td>
                <td>
                    <a href="{{ route('market.index')}}" class="btn btn-primary">{{__('market.index')}}</a>
                </td>
            </tr>

            </tbody>
        </table>
    </div>
@endsection
