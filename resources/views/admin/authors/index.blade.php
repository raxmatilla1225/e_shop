@extends('admin.layout.master')
@section('title','NewCategory')
@section('content')
    <div class="container">
        <div class="row float-right">
            <div class="col-md-12 mb-3 mt-2 mr-5">
                <a href="{{route('authors.create')}}" class="btn btn-success">{{__('author.create')}}</a>
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
                <th scope="col">ID</th>
                <th scope="col">{{__('author.name')}}</th>
                <th scope="col">{{ __('author.actions') }}</th>
            </tr>
            </thead>
            <tbody>
            @foreach($authors as $author)
                <tr>
                    <th scope="row">{{$author->id}}</th>
                    <td>{{$author->name}}</td>
                    <td>
                        <div class="row">
                            <a class="btn btn-warning"
                               href="{{route('authors.show', ['author'=> $author])}}">{{__('new_category.show')}}</a>
                            <a class="btn btn-primary"
                               href="{{route('authors.edit', ['author'=> $author])}}">{{__('new_category.update')}}</a>
                            <form action="{{route('authors.destroy', ['author' => $author])}}" method="post">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger">{{__('author.delete')}}</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
