@extends('admin.layout.master')
@section('title', 'Provinces-show')
@section('content')
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">{{__('province.name')}}</th>
            <th scope="col">{{__('province.pId')}}</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <th scope="row">{{ $province->id }}</th>
            <td>{{$province->name}}</td>
            <td>{{$province->province_id}}</td>
            <td>
                <a href="{{ route('provinces.index')}}" class="btn btn-primary">{{__('province.go-back')}}</a>
            </td>
        </tr>

        </tbody>
    </table>
@endsection()

