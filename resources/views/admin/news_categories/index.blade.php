@extends('admin.layout.master')
@section('title','NewCategory')
@section('content')
    <div class="container">
        <div class="row float-right">
            <div class="col-md-12 mb-3 mt-2 mr-5">
                <a href="{{route('newsCategory.create')}}" class="btn btn-success">{{__('new_category.create')}}</a>
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
                <th scope="col">{{__('new_category.name')}}</th>
                <th scope="col">{{ __('new_category.actions') }}</th>
            </tr>
            </thead>
            <tbody>
            @foreach($news_c as $newsCategory)
                <tr>
                    <th scope="row">{{$newsCategory->id}}</th>
                    <td>{{$newsCategory->name}}</td>
                    <td>
                        <div class="row">
                            <a class="btn btn-warning"
                               href="{{route('newsCategory.show', ['newsCategory'=> $newsCategory])}}">{{__('new_category.show')}}</a>
                            <a class="btn btn-primary"
                               href="{{route('newsCategory.edit', ['newsCategory'=> $newsCategory])}}">{{__('new_category.update')}}</a>
                            <form action="{{route('newsCategory.destroy', ['newsCategory' => $newsCategory])}}" method="post">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger">{{__('new_category.delete')}}</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
