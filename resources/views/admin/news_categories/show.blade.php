@extends('admin.layout.master')
@section('title', 'NewCategory-show')
@section('content')


    <table class="table">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">{{__('new_category.name')}}</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <th scope="row">{{$newsCategory->id}}</th>
            <td>{{$newsCategory->name}}</td>
            <td>
                <a href="{{ route('newsCategory.index')}}" class="btn btn-primary">{{__('new.go-back')}}</a>
            </td>
        </tr>

        </tbody>
    </table>
@endsection()
