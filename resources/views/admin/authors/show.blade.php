@extends('admin.layout.master')
@section('title', 'author-show')
@section('content')


    <table class="table">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">{{__('author.name')}}</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <th scope="row">{{$author->id}}</th>
            <td>{{$author->name}}</td>
            <td>
                <a href="{{ route('authors.index')}}" class="btn btn-primary">{{__('author.go-back')}}</a>
            </td>
        </tr>

        </tbody>
    </table>
@endsection()
