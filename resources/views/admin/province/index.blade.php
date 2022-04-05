@extends('admin.layout.master')
@section('title','Provinces')
@section('content')
    <div class="container">
        <div class="row float-right">
            <div class="col-md-12 mb-3 mt-2 mr-5">
                <a href="{{route('provinces.create')}}" class="btn btn-success">{{__('province.create')}}</a>
            </div>
        </div>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">{{__('province.name')}}</th>
                <th scope="col">{{__('province.pId')}} </th>
            </tr>
            </thead>
            <tbody>
            @foreach($provinces as $province)
                <tr>
                    <th scope="row">{{$loop->index +1}}</th>
                    <td>{{$province->name}}</td>
                    <td>{{$province->province_id}}</td>
                    <td>
                        <div class="row">
                            <a class="btn btn-warning" href="{{route('provinces.show', ['province'=> $province])}}">{{__('province.show')}}</a>
                            <a class="btn btn-primary" href="{{route('provinces.edit', ['province'=> $province])}}">{{__('province.update')}}</a>
                            <form action="{{route('provinces.destroy', ['province'=> $province])}}" method="post">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger">{{__('province.delete')}}</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
